
#### Sistema de Produtos e Fornecedores

### Requisitos

    Para executar o projeto localmente, é necessário ter:
    PHP 7.4
    MySQL
    Servidor Apache (XAMPP, WAMP ou similar)
    Navegador web atualizado

### Instalação

    Clonar o repositório
    git clone https://github.com/seu-usuario/seu-repositorio.git
    Ou baixar o projeto e extrair na pasta htdocs do XAMPP.
    Exemplo: C:\xampp\htdocs\virtualMarket

### Criar o banco de dados

    Acesse o phpMyAdmin
    Crie um banco de dados (exemplo):
    CREATE DATABASE virtual_market;
    Importe o arquivo SQL localizado em:
    /database/schema.sql

### Configurar conexão com o banco

    Edite o arquivo: /app/config/Database.php

    Atualize as credenciais conforme seu ambiente:
        private $host = 'localhost';
        private $db   = 'virtual_market';
        private $user = 'root';
        private $pass = '';

### Configurar o servidor

    Certifique-se de que o Apache e o MySQL estejam rodando no XAMPP.
    Acesse o sistema pelo navegador:
    http://localhost/virtualMarket
    Acesso ao sistema
    O sistema possui uma área de login para uso interno.
    Você pode:
    Criar um usuário diretamente pela interface (se disponível)
    Ou inserir um usuário manualmente no banco para o primeiro acesso

### Tecnologias utilizadas

    PHP 7.4
    MySQL
    HTML5 / CSS3
    Bootstrap
    JavaScript
    jQuery
    AJAX

### Observações

    O projeto não utiliza frameworks PHP, conforme solicitado.
    A validação de CNPJ via BrasilAPI é opcional e não bloqueia o cadastro caso a API esteja indisponível.
    O sistema foi desenvolvido para fins de avaliação técnica.

## Autor
##### Israel Almeida