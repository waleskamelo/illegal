<?php
session_start();

require_once __DIR__. "/model/Usuario.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario();
$login = $usuario->login($email, $senha);
if ($login) {
    $_SESSION['usuario'] = $login;
    return header("location:/illegal/admin");
}

header("location:/illegal/login.php");

