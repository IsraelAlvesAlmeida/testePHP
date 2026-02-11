<?php
require_once __DIR__ . '/Database.php';

class Usuario
{
    public static function autenticar($email, $senha)
    {
        $db = Database::getInstance();

        $sql = "SELECT * FROM usuarios WHERE email = :email AND status = 'ativo'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }

        return false;
    }
}
