<?php
session_start();
require_once __DIR__ . '/../models/Fornecedor.php';

$acao = $_POST['acao'] ?? '';

if ($acao === 'salvar') {

    $dados = [
        'nome' => trim($_POST['nome']),
        'cnpj' => trim($_POST['cnpj']),
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'status' => $_POST['status'],
        'created_by' => $_SESSION['usuario']['id']
    ];

    if (empty($dados['nome']) || empty($dados['cnpj'])) {
        echo json_encode(['success' => false, 'msg' => 'Nome e CNPJ são obrigatórios']);
        exit;
    }

    Fornecedor::salvar($dados);
    echo json_encode(['success' => true]);
}

// Nova ação para buscar fornecedor por ID
if ($acao === 'buscar') {
    echo json_encode(Fornecedor::buscar($_POST['id']));
}

// Nova ação para atualizar fornecedor
if ($acao === 'atualizar') {

    $dados = [
        'id' => $_POST['id'],
        'nome' => trim($_POST['nome']),
        'cnpj' => trim($_POST['cnpj']),
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'status' => $_POST['status']
    ];

    Fornecedor::atualizar($dados);

    echo json_encode(['success' => true]);
}

if ($acao === 'ativos') {
    echo json_encode(Fornecedor::listarAtivos());
}

// Nova ação para remover fornecedor
if ($acao === 'remover') { 

    $fornecedorId = $_POST['id'];

    if (!Fornecedor::podeRemover($fornecedorId)) {
        echo json_encode([
            'success' => false,
            'message' => 'Fornecedor possui produtos vinculados e não pode ser removido'
        ]);
        exit;
    }

    $resultado = Fornecedor::remover($fornecedorId);

    echo json_encode([
        'success' => $resultado['success'],
        'message' => $resultado['success']
            ? 'Fornecedor removido com sucesso'
            : $resultado['error']
    ]);
    exit;
}

