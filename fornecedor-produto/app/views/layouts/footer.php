</div>
</div>

<footer class="bg-light text-center py-4 mt-0 border-top">
    &copy; <?= date('Y') ?> Fornecedor-Produto. Todos os direitos reservados.
</footer>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.min.js"></script>

<!-- Seu JS (SEMPRE POR ÚLTIMO) -->
<script src="/virtualMarket/fornecedor-produto/public/js/app.js"></script>

<script>
    $(function () {
        $('#tabela').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.3.7/i18n/pt-BR.json'
            }
        });
    });
</script>


</body>

</html>