<?php
session_start();
require_once __DIR__ . '/../layouts/header.php';
require_once __DIR__ . '/../../models/Produto.php';

$produtos = Produto::listar();
?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Produtos</h5>
        <button class="btn btn-primary btn-sm" onclick="novoProduto()">
            Novo Produto
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="tabela">
                <thead class="table-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Fornecedor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $p): ?>
                        <tr>
                            <td><?= $p['codigo'] ?> </td>
                            <td><?= $p['nome'] ?> </td>
                            <td><?= $p['descricao'] ?> </td>
                            <?php if ($p['status'] === 'ativo'): ?>
                                <td><span class="badge bg-success">Ativo</span></td>
                            <?php else: ?>
                                <td><span class="badge bg-danger">Inativo</span></td>
                            <?php endif; ?>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="abrirVinculo(<?= $p['id'] ?>)">
                                   <i class="fa-solid fa-link"></i> &nbsp; Vincular
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-actions" onclick="editarProduto(<?= $p['id'] ?>)">
                                    <i class="fa-solid fa-pen-to-square"></i></button>

                                <button class="btn btn-sm btn-danger btn-actions" onclick="removerProduto(<?= $p['id'] ?>)">
                                    <i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div><!-- table-responsive -->

    </div> <!-- card-body -->
</div> <!-- card -->

<!-- Modal Produto-->
<div class="modal fade" id="modalProduto">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="acao" id="acao">

                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Código interno</label>
                        <input type="text" name="codigo" id="codigo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Vincular Fornecedores -->
<div class="modal fade" id="modalVinculo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Vínculo de Fornecedores</h5>
            </div>

            <div class="modal-body">
                <input type="hidden" id="produto_vinculo_id" name="produto_id">

                <select id="fornecedor_select" class="form-select mb-3">
                    <!-- fornecedores ativos -->
                </select>

                <button class="btn btn-success mb-3" onclick="vincularFornecedor()">
                    Vincular
                </button>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fornecedor</th>
                            <th>CNPJ</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody id="listaFornecedoresVinculados"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>