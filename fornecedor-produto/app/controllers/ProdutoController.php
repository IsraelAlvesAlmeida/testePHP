<?php
header('Content-Type: application/json');
require_once '../models/Produto.php';

$acao = $_POST['acao'] ?? '';

if ($acao === 'salvar') {
    Produto::salvar($_POST);
    echo json_encode(['success' => true, 'msg' => 'Produto salvo com sucesso']);
    exit;
}

if ($acao === 'atualizar') {
    Produto::atualizar($_POST);
    echo json_encode(['success' => true, 'msg' => 'Produto atualizado com sucesso']);
    exit;
}

if ($acao === 'buscar') {
    $produto = Produto::buscar($_POST['id']);
    echo json_encode($produto);
    exit;
}

if ($acao === 'remover') {

    $produtoId = $_POST['id'];

    if (!Produto::podeRemover($produtoId)) {
        echo json_encode([
            'success' => false,
            'message' => 'Produto possui fornecedores vinculados e não pode ser removido'
        ]);
        exit;
    }

    $resultado = Produto::remover($produtoId);

    echo json_encode([
        'success' => $resultado['success'],
        'message' => $resultado['success']
            ? 'Produto removido com sucesso'
            : $resultado['error']
    ]);
    exit;
}
    
