<?php
session_start();
require_once __DIR__ . '/../models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = 'Preencha todos os campos.';
        header('Location: /virtualMarket/fornecedor-produto/public/login.php');
        exit;
    }

    $usuario = Usuario::autenticar($email, $senha);

    if ($usuario) {
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nome' => $usuario['nome'],
            'email' => $usuario['email']
        ];
        header('Location: /virtualMarket/fornecedor-produto/public/index.php');
        exit;
    }

    $_SESSION['erro'] = 'Usuário ou senha inválidos.'. $senha;
    header('Location: /virtualMarket/fornecedor-produto/public/login.php');
}
