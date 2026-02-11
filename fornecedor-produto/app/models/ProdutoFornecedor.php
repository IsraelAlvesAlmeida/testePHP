<?php

require_once __DIR__ . '/Database.php'; // Inclui a classe de conexão com o banco de dados

class ProdutoFornecedor
{
    public static function vincular($produtoId, $fornecedorId)
    {
        $db = Database::getInstance(); // Conexão com o banco de dados

        // Regra de negócio: fornecedor ativo
        $stmt = $db->prepare("SELECT status FROM fornecedores WHERE id = ?"); // Verifica status do fornecedor
        $stmt->execute([$fornecedorId]); // Executa a consulta
        $fornecedor = $stmt->fetch(); // Obtém os dados do fornecedor_id

        if (!$fornecedor || $fornecedor['status'] !== 'ativo') { // Se o fornecedor não existir ou estiver inativo
            return false; // Retorna erro
        }

        $stmt = $db->prepare("
            INSERT INTO produto_fornecedor (produto_id, fornecedor_id)
            VALUES (?, ?)
        "); // Prepara a inserção do vínculo

        try {
            $stmt->execute([$produtoId, $fornecedorId]); // Executa a inserção
            return true; // Retorna sucesso
        } catch (PDOException $e) { // Captura exceção (ex: vínculo já existe)
            return false; // Retorna erro
        }
    }

    public static function listarPorProduto($produtoId)
    {
        $db = Database::getInstance(); // Conexão com o banco de dados

        $stmt = $db->prepare("
            SELECT f.id, f.nome, f.cnpj
            FROM produto_fornecedor pf
            JOIN fornecedores f ON f.id = pf.fornecedor_id
            WHERE pf.produto_id = ?
        "); // Prepara a consulta para listar fornecedores vinculados

        $stmt->execute([$produtoId]); // Executa a consulta
        return $stmt->fetchAll(); // Retorna os fornecedores vinculados
    }

    public static function remover($produtoId, $fornecedorId) // Remove vínculo
    {
        $db = Database::getInstance(); // Conexão com o banco de dados

        $stmt = $db->prepare("
            DELETE FROM produto_fornecedor
            WHERE produto_id = ? AND fornecedor_id = ?
        "); // Prepara a remoção do vínculo

        return $stmt->execute([$produtoId, $fornecedorId]); // Executa a remoção
    }
}
