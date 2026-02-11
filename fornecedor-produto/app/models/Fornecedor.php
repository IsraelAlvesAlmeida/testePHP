<?php
require_once __DIR__ . '/Database.php';

class Fornecedor
{
    public static function listar()
    {
        $db = Database::getInstance();
        $sql = "
            SELECT f.*, u.nome AS usuario
            FROM fornecedores f
            LEFT JOIN usuarios u ON u.id = f.created_by
            ORDER BY f.nome
        ";
        return $db->query($sql)->fetchAll(); // O método query() é usado para executar a consulta SQL e o método fetchAll() é usado para obter todos os resultados da consulta como um array associativo.
    }

    public static function buscar($id)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM fornecedores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function salvar($dados)
    {
        $db = Database::getInstance();

        //  SQl enviado para o banco de dados
        // O comando SQL é preparado para inserir um novo registro na tabela "fornecedores" com os dados fornecidos.
        $sql = "INSERT INTO fornecedores 
                (nome, cnpj, email, telefone, status, created_by)
                VALUES (:nome, :cnpj, :email, :telefone, :status, :created_by)";
        // O comando SQL é preparado sem os dados diretamente inseridos nele, para evitar a injeção de SQL, os dados são enviados separadamente para o banco de dados usando parâmetros nomeados (ex: :nome, :cnpj, etc.). 
        $stmt = $db->prepare($sql);
        // O método prepare() é usado para preparar a consulta SQL
        return $stmt->execute($dados); 
        // O método execute() é usado para executar a consulta com os dados fornecidos. Isso ajuda a proteger contra ataques de injeção de SQL, pois os dados são tratados como parâmetros em vez de serem diretamente inseridos na consulta SQL.
    }

    public static function atualizar($dados)
    {
        $db = Database::getInstance();

        $sql = "UPDATE fornecedores SET
                nome = :nome,
                cnpj = :cnpj,
                email = :email,
                telefone = :telefone,
                status = :status
                WHERE id = :id";

        $stmt = $db->prepare($sql);
        return $stmt->execute($dados);
    }

    public static function listarAtivos()
    {
        $db = Database::getInstance();

        $stmt = $db->query("
            SELECT id, nome 
            FROM fornecedores 
            WHERE status = 'ativo'
            ORDER BY nome
        ");

        return $stmt->fetchAll();
    }

    public static function podeRemover($fornecedorId)
    {
        $db = Database::getInstance();

        $stmt = $db->prepare("
        SELECT COUNT(*) 
        FROM produto_fornecedor 
        WHERE fornecedor_id = ?
    ");
        $stmt->execute([$fornecedorId]);

        return $stmt->fetchColumn() == 0;
    }

    public static function remover($fornecedorId)
    {
        $db = Database::getInstance();

        try {
            $stmt = $db->prepare("DELETE FROM fornecedores WHERE id = ?");
            $stmt->execute([$fornecedorId]);

            return ['success' => true];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'error' => 'Erro ao remover fornecedor'
            ];
        }
    }

}


