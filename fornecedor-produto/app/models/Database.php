<?php

class Database
{
    private static $instance = null; // Instância única da classe
    private $conn; // Conexão PDO

    private $host = 'localhost'; // Host do banco de dados
    private $db = 'fornecedor_produto'; // Nome do banco de dados
    private $user = 'root'; // Usuário do banco de dados
    private $pass = ''; // Senha do banco de dados
    private $charset = 'utf8mb4'; // Conjunto de caracteres

    private function __construct()
    {
        // Configura a conexão PDO
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}"; 

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ativa o modo de erro do PDO para exceções
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define o modo de busca padrão para arrays associativos
            PDO::ATTR_EMULATE_PREPARES => false, // Desativa a emulação de prepared statements
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options); // Cria a conexão PDO
        } catch (PDOException $e) { // Trata erros de conexão
            die('Erro de conexão: ' . $e->getMessage()); // Exibe a mensagem de erro e encerra o script
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) { // verifica se a instância já foi criada
            self::$instance = new Database(); // cria a instância se não existir
        }

        return self::$instance->conn; // retorna a conexão PDO
    }
}
