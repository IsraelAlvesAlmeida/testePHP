<?php
session_start();
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../../models/Fornecedor.php';

$fornecedores = Fornecedor::listar();
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Fornecedores</h5>
        <button class="btn btn-primary btn-sm" onclick="novoFornecedor()">
            Novo Fornecedor
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tabela">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fornecedores as $f): ?>
                        <tr>
                            <td><?= $f['nome'] ?></td>
                            <td><?= $f['cnpj'] ?></td>
                            <td><?= $f['email'] ?></td>
                            <?php if ($f['status'] === 'ativo'): ?>
                                <td><span class="badge bg-success">Ativo</span></td>
                            <?php else: ?>
                                <td><span class="badge bg-danger">Inativo</span></td>
                            <?php endif; ?>
                            <td>
                                <button class="btn btn-sm btn-warning btn-actions" onclick="editarFornecedor(<?= $f['id'] ?>)">
                                    <i class="fa-solid fa-pen-to-square"></i></button>

                                <button class="btn btn-sm btn-danger btn-actions" onclick="deletarFornecedor(<?= $f['id'] ?>)">
                                    <i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div><!-- table-responsive -->
    </div> <!-- card-body -->
</div> <!-- card -->

<!-- Modal -->
<div class="modal fade" id="modalFornecedor">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formFornecedor">
                <div class="modal-header">
                    <h5 class="modal-title">Fornecedor</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="acao" id="acao" value="salvar">

                    <div class="mb-2">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control js-cnpj" placeholder="00.000.000/0000-00" maxlength="18" required>
                        <small class="text-muted">Digite o CNPJ e saia do campo para buscar</small>
                    </div>

                    <div class="mb-2">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email@dominio.com" maxlength="100">
                    </div>

                    <div class="mb-2">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(00) 0000-0000" maxlength="14">
                    </div>

                    <div class="mb-2">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>