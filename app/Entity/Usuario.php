<?php

namespace App\Entity;

// Instanciando conexão com o banco
require_once 'app/Db/Database.php';

use \App\Db\Database;
use PDO;

class Usuario
{
  public $id;
  public $company;
  public $username;
  public $email;
  public $first_name;
  public $last_name;
  public $address;
  public $city;
  public $country;
  public $postal;
  public $about;
  public $salary;


  public function cadastrar()
  {
    // criando o usuario no DB
    $objDatabase = new Database('usuarios');

    $this->id = $objDatabase->insert([
      'company' => $this->company,
      'username' => $this->username,
      'email' => $this->email,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'address' => $this->address,
      'city' => $this->city,
      'country' => $this->country,
      'postal' => $this->postal,
      'about' => $this->about,
      'salary' => $this->salary
    ]);
    return true;
  }

  public function atualizar()
  {
    return (new Database('usuarios'))->update('id = ' . $this->id, [
      'company' => $this->company,
      'username' => $this->username,
      'email' => $this->email,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'address' => $this->address,
      'city' => $this->city,
      'country' => $this->country,
      'postal' => $this->postal,
      'about' => $this->about,
      'salary' => $this->salary
    ]);
  }

  public function excluir() {
    return (new Database('usuarios'))->delete('id = '.$this->id);
  }

  public static function getUsuarios($where = null, $order = null, $limit = null)
  {
    return (new Database('usuarios'))->select($where, $order, $limit, "id, first_name, last_name, 
    country, city, salary")->fetchAll(PDO::FETCH_CLASS);
  }

  public static function getUsuario($id)
  {
    return (new Database('usuarios'))->select('id = ' . $id)->fetchObject(self::class);
  }
}
