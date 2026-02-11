<?php

require_once __DIR__ . '/Database.php';

class Produto
{
    public static function listar()
    {
        $db = Database::getInstance();
        return $db->query("SELECT * FROM produtos ORDER BY nome")->fetchAll();
    }

    public static function buscar($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function salvar($dados)
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            INSERT INTO produtos (nome, descricao, codigo, status)
            VALUES (?, ?, ?, ?)
        ");

        return $stmt->execute([
            trim($dados['nome']),
            trim($dados['descricao']),
            trim($dados['codigo']),
            $dados['status']
        ]);
    }

    public static function atualizar($dados)
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
            UPDATE produtos SET
                nome = ?,
                descricao = ?,
                codigo = ?,
                status = ?
            WHERE id = ?
        ");

        return $stmt->execute([
            trim($dados['nome']),
            trim($dados['descricao']),
            trim($dados['codigo']),
            $dados['status'],
            $dados['id']
        ]);
    }

    public static function podeRemover($produtoId)
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
        SELECT COUNT(*) 
        FROM produto_fornecedor 
        WHERE produto_id = ?
    ");
        $stmt->execute([$produtoId]);

        return $stmt->fetchColumn() == 0;
    }

    public static function remover($produtoId)
    {
        $db = Database::getInstance();

        try {
            $stmt = $db->prepare("DELETE FROM produtos WHERE id = ?");
            $stmt->execute([$produtoId]);

            return ['success' => true];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'error' => 'Erro ao remover produto'
            ];
        }
    }

}
