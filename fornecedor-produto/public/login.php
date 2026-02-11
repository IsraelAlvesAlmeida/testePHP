<?php
session_start();
$erro = $_SESSION['erro'] ?? null;
unset($_SESSION['erro']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-3">Acesso ao Sistema</h4>

                        <?php if ($erro): ?>
                            <div class="alert alert-danger">
                                <?= $erro ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="/virtualMarket/fornecedor-produto/app/controllers/AuthController.php">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required value="admin@empresa.com">
                            </div>

                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha" class="form-control" required value="123456">
                            </div>

                            <button class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>