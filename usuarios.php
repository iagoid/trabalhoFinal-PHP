<?php
    require_once 'app/Entity/Usuario.php';
    use \App\Entity\Usuario;
	define('NAV', 'usuarios');
	define('TITLE', 'Usuários Cadastrados');

    $usuarios = Usuario::getUsuarios();
    

    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/menu.php';
    include __DIR__ . '/includes/navbar.php';
    include __DIR__ . '/includes/listagem.php';
    include __DIR__ . '/includes/footer.php';
