<?php
// Instanciando Usuario
require_once 'app/Entity/Usuario.php';

use \App\Entity\Usuario;

if (!isset($_GET['id']) or !is_numeric(($_GET['id']))) {
  header('location: index.php?status=error');
  exit;
}

$objUsuario = Usuario::getUsuario($_GET['id']);

// Validação do  usuário
if (!$objUsuario instanceof Usuario) {
  header('location: index.php?status=error');
  exit;
}

// Validação
if (isset($_POST["excluir"])) {

  $objUsuario->excluir();

  header('location: usuarios.php?status=success');
}

define('NAV', 'deletar');
define('TITLE', 'Deletar o Usuário ' . $objUsuario->username);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/menu.php';
include __DIR__ . '/includes/navbar.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
