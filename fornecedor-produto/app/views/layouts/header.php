<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header('Location: /virtualMarket/fornecedor-produto/public/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sistema</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Meu CSS -->
     <link href="/virtualMarket/fornecedor-produto/public/css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top mb-5 ">
        <div class="container-fluid">
            <span class="navbar-brand">Fornecedor & Produtos</span>

            <span>
                <a href="/virtualMarket/fornecedor-produto/public/index.php" class="btn btn-sm btn-light me-2 btn-nav">
                    <i class="fa-solid fa-house"></i> Home
                </a>

                <a href="/virtualMarket/fornecedor-produto/app/views/fornecedores/index.php" class="btn btn-sm btn-light me-2 btn-nav">
                    <i class="fa-solid fa-truck"></i> Fornecedores
                </a>
                <a href="/virtualMarket/fornecedor-produto/app/views/produtos/index.php" class="btn btn-sm btn-light btn-nav">
                    <i class="fa-solid fa-box"></i> Produtos
                </a>
            </span>

            <span class="text-white d-flex align-items-center justify-content-center">
                <span><small>Bem vindo,&nbsp;</small></span>
                <span><?= $_SESSION['usuario']['nome'] ?></span>
                <a href="/virtualMarket/fornecedor-produto/public/logout.php" class="btn btn-sm btn-danger ms-2"><i class="fa-solid fa-right-from-bracket"></i></a>
            </span>
        </div>
    </nav>

    <div id="content" class="container-fluid">
        <div class="content-box container mt-4">
            <div id="alert-container"></div> <!-- Container para alertas dinâmicos -->