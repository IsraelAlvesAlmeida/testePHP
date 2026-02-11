
# DECISÕES TÉCNICAS

Sistema de Produtos e Fornecedores

## Modelagem do Banco de Dados

    O banco de dados foi modelado de forma normalizada, utilizando um relacionamento N:N (muitos para muitos) entre produtos e fornecedores.

## Tabelas principais

### fornecedores

    id (PK)
    nome
    cnpj
    email
    telefone
    status (ativo / inativo)

### produtos
    id (PK)
    nome
    descricao
    codigo
    status (ativo / inativo)

### produto_fornecedor

    produto_id (FK → produtos.id)
    fornecedor_id (FK → fornecedores.id)
    Essa estrutura permite:
    Um produto estar vinculado a vários fornecedores
    Um fornecedor fornecer vários produtos
    Aplicação clara de regras de negócio no vínculo

## Estrutura do Projeto

    Optei por uma separação simples de responsabilidades, sem uso de framework PHP, respeitando o escopo do teste.

    A organização do projeto foi definida da seguinte forma:

    Controllers
        Responsáveis por receber requisições, coordenar ações e retornar respostas (JSON).

    Models
        Concentram as regras de negócio e o acesso ao banco de dados.

    Views
        Responsáveis exclusivamente pela interface (HTML + Bootstrap).

    AJAX (jQuery)
        Utilizado para comunicação assíncrona entre frontend e backend.

    Decisões complementares adotadas:

        1. Para autenticação, utilizei password_hash e password_verify, garantindo armazenamento seguro de senhas e compatibilidade futura com mudanças de algoritmo.

        2. O jQuery foi carregado no header para garantir sua disponibilidade antes da execução de scripts dependentes, evitando erros de ordem de carregamento.

        3. Foi implementada validação de CNPJ utilizando a BrasilAPI, permitindo o preenchimento automático de dados do fornecedor. Esse recurso é opcional e não bloqueia o cadastro caso a API esteja indisponível, garantindo maior resiliência ao sistema.

        4. Utilizei jQuery Mask para aplicação de máscaras de CNPJ e telefone, por ser uma solução leve, amplamente utilizada e adequada para sistemas internos.

        5. Optei por uma estrutura baseada em controllers por arquivo, evitando um roteador central para manter simplicidade, clareza e foco nos requisitos do teste.

        6. Implementei uma verificação de integridade antes da exclusão de registros para evitar inconsistências de negócio.

    #### Essa abordagem mantém o código: Legível - Fácil de manter - Adequado ao escopo do teste

## Decisões de Arquitetura

    As principais decisões técnicas foram:
        Não utilização de frameworks PHP, conforme solicitado no teste
        Uso de PDO com prepared statements, prevenindo SQL Injection
        O Model não retorna JSON, apenas dados ou booleanos
        O controller é responsável por formatar a resposta adequada ao frontend
        Uso de Bootstrap para agilizar o desenvolvimento da interface
        Uso de jQuery para facilitar AJAX e manipulação do DOM

## Regra de Negócio Implementada (Diferencial)

    Foi implementada a seguinte regra de negócio:
        Impedir vínculo com fornecedor inativo
        Antes de criar o vínculo entre produto e fornecedor, o sistema verifica se o fornecedor está com status ativo.

    Caso contrário:
        O vínculo não é criado
        O usuário recebe feedback visual
        Essa decisão evita inconsistências nos dados e reflete um cenário real de negócio.

## Comunicação Assíncrona

    As principais ações do sistema utilizam AJAX, incluindo:
    Cadastro e edição de produtos
    Cadastro e edição de fornecedores
    Vínculo e remoção de fornecedores por produto
    Essa abordagem melhora a experiência do usuário e reduz recarregamentos desnecessários de página.

## O que seria melhorado com mais tempo

    Com mais tempo disponível, seriam consideradas as seguintes melhorias:
    Validações mais robustas no frontend
    Mensagens de erro mais específicas por cenário
    Paginação e filtros de busca nas listagens
    Logs de auditoria (quem vinculou ou removeu registros)
    Padronização completa de rotas
    Middleware simples para autenticação

## Considerações Finais

    O foco do projeto foi entregar:
    Funcionalidades completas
    Código organizado
    Decisões técnicas conscientes
    Simplicidade sem perder qualidade
    O sistema atende aos requisitos propostos e foi estruturado pensando em clareza, manutenção e possibilidade de evolução futura.


Atenciosamente,
##### Israel Almeida