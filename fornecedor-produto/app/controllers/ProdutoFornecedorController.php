<?php
header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON

require_once '../models/ProdutoFornecedor.php'; // Inclui o modelo ProdutoFornecedor

$acao = $_POST['acao'] ?? ''; // Obtém a ação a ser realizada

if ($acao === 'vincular') {

    $resultado = ProdutoFornecedor::vincular(
        $_POST['produto_id'],
        $_POST['fornecedor_id']
    );

    if($resultado) {
        echo json_encode(['success' => true, 'message' => 'Fornecedor vinculado com sucesso']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Vínculo já existe ou fornecedor inativo']);
    }
    exit;
}

if ($acao === 'listar') { // Se a ação for listar fornecedores vinculados a um produto_fornecedor
    echo json_encode(
        ProdutoFornecedor::listarPorProduto($_POST['produto_id'])
    );
}

if ($acao === 'remover') { // Se a ação for remover vínculo
    ProdutoFornecedor::remover($_POST['produto_id'], $_POST['fornecedor_id']);
    echo json_encode(['success' => true]);
}
