<?php

// Instanciando Usuario
require_once 'app/Entity/Usuario.php';
use \App\Entity\Usuario;
$objUsuario = new Usuario;


// Validação
if (isset(
    $_POST["company"], $_POST["username"], $_POST["email"], $_POST["first_name"],
    $_POST["last_name"], $_POST["address"], $_POST["city"], $_POST["country"],
    $_POST["postal"], $_POST["about"], $_POST["salary"],)) {
        $objUsuario->company = $_POST["company"];
        $objUsuario->username = $_POST["username"];
        $objUsuario->email = $_POST["email"];
        $objUsuario->first_name = $_POST["first_name"];
        $objUsuario->last_name = $_POST["last_name"];
        $objUsuario->address = $_POST["address"];
        $objUsuario->city = $_POST["city"];
        $objUsuario->country = $_POST["country"];
        $objUsuario->postal = $_POST["postal"];
        $objUsuario->about = $_POST["about"];
        $objUsuario->salary = $_POST["salary"];

        $objUsuario->cadastrar();

        header('location: cadastro.php?status=success');
}

define('NAV', 'cadastro');
define('TITLE', 'Cadastrar Novo Usuário');

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/menu.php';
include __DIR__ . '/includes/navbar.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
