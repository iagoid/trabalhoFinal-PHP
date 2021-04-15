<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{
    const HOST = 'localhost';
    const NAME = 'trabalho_final';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // setMessage não funciona
            die('ERROR: ' . $e->PDOException::setMessage());
        }
    }

    public function execute($query, $params = [])
    {

        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            // setMessage não funciona
            die('ERROR: ' . $e->PDOException::setMessage());
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ')
        VALUES (' . implode(",", $binds) . ')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        // Seleciona os dados do banco
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        //Montando query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
        return $this->execute($query);
    }

    public function update($where, $values){
        // Seleciona os dados do banco
        $fields = array_keys($values);
        
        //Montando query
        $query = 'UPDATE '.$this->table.' SET '.implode("=?,",$fields).'=? WHERE '.$where;
        $this->execute($query, array_values($values));
        return true;
    }

    public function delete($where){
        //Montando query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }
}
