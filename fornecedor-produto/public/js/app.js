// JavaScript para formatação de CNPJ e telefone
$(document).on('input keyup blur', '.js-cnpj', function () {
    console.log('evento cnpj disparou'); // DEBUG

    let v = this.value.replace(/\D/g, '');

    v = v.replace(/^(\d{2})(\d)/, '$1.$2');
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
    v = v.replace(/(\d{4})(\d)/, '$1-$2');

    this.value = v;
});

// Formatação de telefone (ex: (12) 34567-8901 ou (12) 3456-7890)
$(document).on('input', '#telefone', function () {
    let v = this.value.replace(/\D/g, '');

    if (v.length <= 10) {
        v = v.replace(/^(\d{2})(\d)/, '($1) $2');
        v = v.replace(/(\d{4})(\d)/, '$1-$2');
    } else {
        v = v.replace(/^(\d{2})(\d)/, '($1) $2');
        v = v.replace(/(\d{5})(\d)/, '$1-$2');
    }

    this.value = v;
});

// ************************************************************************************************* //

// JavaScript para gerenciamento de fornecedores e produtos
// Requer jQuery e Bootstrap 5
// Requisições AJAX para salvar/atualizar fornecedor e produtoController

const path = '/virtualMarket/fornecedor-produto/app/controllers/';
let modalFornecedor;

// Gerenciamento de fornecedores
$(function () {
    modalFornecedor = new bootstrap.Modal(document.getElementById('modalFornecedor'));

    $('#formFornecedor').on('submit', function (e) { // Salva ou atualiza fornecedor via AJAX
        e.preventDefault();

        $.post(path + 'FornecedorController.php', // URL do controller
            $(this).serialize(), // Dados do formulário
            function (res) {
                let r = JSON.parse(res); // Resposta do servidor
                if (r.success) {
                    showAlert('Fornecedor salvo com sucesso!', 'success');
                    modalFornecedor.hide();

                    setTimeout(() => { // Aguarda 2s para mostrar o alerta antes de recarregar
                        location.reload(); // Recarrega a página para atualizar a lista
                    }, 2000);
                } else {
                    showAlert(r.message || 'Erro ao salvar fornecedor', 'danger');
                }
            }
        );
    });
});

// Função para abrir modal de cadastro de fornecedor
function novoFornecedor() {
    $('#formFornecedor')[0].reset();
    $('#acao').val('salvar');
    modalFornecedor.show();
}

// Função para abrir modal de edição de fornecedor e preencher os campos com os dados atuais
function editarFornecedor(id) {
    $.post(path + 'FornecedorController.php',
        { acao: 'buscar', id: id },
        function (res) {
            let f = JSON.parse(res);
            $('#id').val(f.id);
            $('#nome').val(f.nome);
            $('#cnpj').val(f.cnpj);
            $('#email').val(f.email);
            $('#telefone').val(f.telefone);
            $('#status').val(f.status);
            $('#acao').val('atualizar');
            modalFornecedor.show();
        }
    );
}

// ************************************************************************************************* //
// Consulta dados do CNPJ ao perder o foco do campo
// Requer CORS habilitado no servidor da Receita Federal
// Mais informações: https://www.receitaws.com.br/api
// Implementação simples para fins didáticos
$('#cnpj').on('blur', function () {

    let cnpj = $(this).val().replace(/\D/g, ''); // Remove tudo que não for número
    if (cnpj.length !== 14) return; // CNPJ deve ter 14 dígitos

    $.get(path + 'CnpjController.php',
        { cnpj: cnpj },
        function (res) {
            if (res.success) {
                $('#nome').val(res.nome);
                $('#email').val(res.email);
                $('#telefone').val(res.telefone);
            } else {
                alert(res.msg);
            }
        },
        'json'
    );
});

// ************************************************************************************************* //

// Bootstrap modal
const modalProduto = new bootstrap.Modal(document.getElementById('modalProduto'));

// Novo produto
function novoProduto() {
    $('#formProduto')[0].reset();
    $('#id').val('');
    $('#acao').val('salvar');
    modalProduto.show();
}

// Salva ou atualiza produto via AJAX
$(document).ready(function () {
    $(document).on('submit', '#formProduto', function (e) {
        e.preventDefault();

        $.ajax({
            url: path + 'ProdutoController.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (resp) {
                if (resp.success) {
                    showAlert('Produto salvo com sucesso!', 'success');
                    modalProduto.hide();
                    setTimeout(() => {
                        location.reload();
                    }, 2000);

                } else {
                    showAlert(resp.message || 'Erro ao salvar', 'danger');
                }
            },
            error: function () {
                showAlert('Erro de comunicação com o servidor.', 'danger');
            }
        });
    });
});

// Editar produto
function editarProduto(id) {
    $.ajax({
        url: path + 'ProdutoController.php',
        type: 'POST',
        data: { acao: 'buscar', id: id },
        dataType: 'json',
        success: function (p) { // Preenche o formulário com os dados do produto
            $('#id').val(p.id);
            $('#nome').val(p.nome);
            $('#descricao').val(p.descricao);
            $('#codigo').val(p.codigo);
            $('#status').val(p.status);
            $('#acao').val('atualizar');
            modalProduto.show(); // Abre o modal para edição
        }
    });
}

// Remover produto
function removerProduto(id) {
    if (!confirm('Deseja realmente remover este produto?')) return;

    $.ajax({
        url: path + 'ProdutoController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            acao: 'remover',
            id: id
        },
        success: function (response) {
            showAlert(response.message || 'Produto removido com sucesso!', response.success ? 'success' : 'danger');
            
            setTimeout(() => {
                location.reload();
            }, 2000);

            if (response.success) {
                setTimeout(() => location.reload(), 1500);
            }
        }
    });
}


// ************************************************************************************************* //

// Gerenciamento de vínculo entre produtos e fornecedores
// Requisições AJAX para listar, vincular e remover fornecedores de um produto_id
const modalVinculo = new bootstrap.Modal(document.getElementById('modalVinculo'));

function abrirVinculo(produtoId) {
    $('#produto_vinculo_id').val(produtoId);
    carregarFornecedoresAtivos();
    carregarFornecedoresVinculados(produtoId);
    modalVinculo.show();
}

function carregarFornecedoresVinculados(produtoId) {
    $.post(path + 'ProdutoFornecedorController.php', // URL do controller
        { acao: 'listar', produto_id: produtoId },
        function (lista) {

            let html = '';
            lista.forEach(f => {
                html += `
                    <tr>
                        <td>${f.id}</td>
                        <td>${f.nome}</td>
                        <td>${f.cnpj}</td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                onclick="removerFornecedor(${produtoId}, ${f.id})">
                                Remover
                            </button>
                        </td>
                    </tr>
                `;
            });

            $('#listaFornecedoresVinculados').html(html);
        },
        'json'
    );
}

// REMOVE o FORNECEDOR (comunica com FornecedorController.php)
function deletarFornecedor(id) {
    if (!confirm('Deseja realmente remover este fornecedor?')) return;

    $.ajax({
        url: path + 'FornecedorController.php',
        type: 'POST',
        dataType: 'json',
        data: {
            acao: 'remover',
            id: id
        },
        success: function (response) {
            showAlert(response.message || 'Fornecedor removido com sucesso!', response.success ? 'success' : 'danger');
            
            setTimeout(() => { // Aguarda 2s para mostrar o alerta antes de recarregar
                location.reload();
            }, 2000);
            

            if (response.success) {
                setTimeout(() => location.reload(), 1500);
            }
        }
    });
}


function vincularFornecedor() {
    $.ajax({
        url: path + 'ProdutoFornecedorController.php',
        type: 'POST',
        data: { acao: 'vincular', produto_id: $('#produto_vinculo_id').val(), fornecedor_id: $('#fornecedor_select').val() },
        dataType: 'json',
        success: function (response) {
            showAlert(response.message || 'Fornecedor vinculado com sucesso!', 'success');
            carregarFornecedoresVinculados($('#produto_vinculo_id').val());
        },
        error: function (response) {
            showAlert(response.message || 'Erro de comunicação com o servidor.', 'danger');
        }

    });
}

// Remove fornecedor vinculado ao produto
function removerFornecedor(produtoId, fornecedorId) {
    $.post(path + 'ProdutoFornecedorController.php', {
        acao: 'remover',
        produto_id: produtoId,
        fornecedor_id: fornecedorId
    }, function () {
        carregarFornecedoresVinculados(produtoId);
    }, 'json');
}

function carregarFornecedoresAtivos() {
    $.post(path + 'FornecedorController.php',
        { acao: 'ativos' },
        function (lista) {

            let options = '<option value="">Selecione um fornecedor</option>';

            lista.forEach(f => {
                options += `<option value="${f.id}">${f.id} - ${f.nome}</option>`;
            });

            $('#fornecedor_select').html(options);
        },
        'json'
    );
}

// ************************************************************************************************* //

// Função para exibir alertas dinâmicos usando Bootstrap
// type: 'success', 'danger', 'warning', 'info'
// Exemplo: showAlert('Fornecedor salvo com sucesso!', 'success');
// O alerta desaparece automaticamente após 4 segundos (opcional)
// O container para os alertas deve estar presente no HTML (ex: <div id="alert-container"></div>)
function showAlert(message, type = 'success') {
    const alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show mt-2" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

    $('#alert-container').html(alertHtml);

    // Auto fechar após 4s (opcional)
    setTimeout(() => {
        $('.alert').alert('close');
    }, 4000);
}

// Exibe alertas armazenados na sessão (ex: após redirecionamento)
$(document).ready(function () {
    const alertData = sessionStorage.getItem('alert');

    if (alertData) {
        const { message, type } = JSON.parse(alertData);
        showAlert(message, type);
        sessionStorage.removeItem('alert');
    }
});


// ************************************************************************************************* //


