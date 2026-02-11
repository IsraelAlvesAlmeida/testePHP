<?php
session_start();
require_once __DIR__ . '/../app/views/layouts/header.php';
?>

<h3>Bem-vindo ao sistema</h3>
<h6>de gestão de fornecedores e produtos! 🎉 </h6>

<div class="alert alert-info mt-3" role="alert">
    Aqui você pode acompanhar, cadastrar e vincular fornecedores aos seus produtos de forma prática e organizada.  
    Aproveite para explorar os recursos e deixar sua operação ainda mais eficiente.
</div>

<p class="mt-4">
    Nosso objetivo é tornar o gerenciamento do seu mercado virtual mais leve e intuitivo.  
    Se encontrar algum problema, verifique as mensagens do console ou entre em contato com o suporte.  
    E lembre-se: cada produto bem cadastrado é um passo rumo ao sucesso do seu negócio!
</p>


<?php
require_once __DIR__ . '/../app/views/layouts/footer.php';
