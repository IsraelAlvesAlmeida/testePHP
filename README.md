# Teste Prático de PHP
# 📌 Teste Prático – Desenvolvedor PHP

## 📌 Contexto

Uma empresa precisa de um **sistema web simples** para gerenciar:

- **Produtos**
- **Fornecedores**
- **Vínculo entre fornecedores e produtos**

O sistema será utilizado internamente pelo time comercial para organizar informações e facilitar decisões de compra.

Não existe um layout pré-definido nem um fluxo fechado.

Você tem liberdade para **tomar decisões técnicas e funcionais**, desde que atenda aos requisitos mínimos descritos abaixo.

---

## 🎯 Objetivo do teste

Avaliar:

- Conhecimento técnico em **PHP, MySQL e jQuery**
- Capacidade de **modelar dados**
- Organização e qualidade de código
- Tomada de decisões diante de requisitos abertos
- Criatividade para melhorar a experiência do usuário

---

## 🛠️ Tecnologias obrigatórias

- [x]  **PHP** (7.4)
- [x]  **MySQL**
- [x]  **HTML + CSS**
- [x]  **jQuery**
- JavaScript puro pode ser usado como complemento

Frameworks PHP **não são permitidos.**

---

## 📦 Funcionalidades mínimas (Obrigatórias)

### 1️⃣ Cadastro de Fornecedores

Cada fornecedor deve conter, no mínimo:

- [x]  Nome
- [x]  CNPJ (não precisa validar na Receita)
- [x]  E-mail
- [x]  Telefone
- [x]  Status (Ativo / Inativo)

**Requisitos:**

- [x]  Listagem de fornecedores
- [x]  Cadastro
- [x]  Edição
- [x]  Validação básica de campos
- [x]  Feedback visual de sucesso ou erro

---

### 2️⃣ Cadastro de Produtos

Cada produto deve conter, no mínimo:

- [x]  Nome
- [x]  Descrição
- [x]  Código interno
- [x]  Status (Ativo / Inativo)

**Requisitos:**

- [x]  Listagem de produtos
- [x]  Cadastro
- [x]  Edição
- [x]  Validação básica

---

### 3️⃣ Vínculo entre Produtos e Fornecedores

Um produto pode estar vinculado a **um ou mais fornecedores**.

**Requisitos:**

- [x]  Criar um vínculo entre produto e fornecedor
- [x]  Listar fornecedores vinculados a um produto
- [x]  Possibilidade de remover o vínculo
- [ ]  Possibilidade de remover vínculos em massa

💡 **Decisão aberta:**

Você decide **como será essa interface** (tela separada, modal, aba, etc.).

---

## 🔄 Requisitos técnicos obrigatórios

- [x]  Uso de **MySQL** com tabelas normalizadas
- [x]  Queries utilizando **JOIN**
- [x]  Comunicação assíncrona com **AJAX (jQuery)**
- [x]  Separação mínima entre:
    - Regra de negócio
    - Acesso a dados
    - Interface
- [x]  Proteção básica contra **SQL Injection**

---

## 🎨 Desafios de criatividade (não obrigatórios, mas avaliados)

Escolha **ao menos 1** dos desafios abaixo (ou proponha outro):

### 🔹 Opção A – Experiência do usuário

- [x]  Filtro ou busca de produtos/fornecedores
- [x]  Feedback visual ao salvar dados
- [ ]  Interface mais intuitiva para o vínculo

### 🔹 Opção B – Regra de negócio

- [x]  Impedir vínculo com fornecedor inativo
- [ ]  Definir fornecedor principal para um produto
- [ ]  Histórico simples de vínculos

### 🔹 Opção C – Organização técnica

- [x]  Estrutura MVC simples
- [x]  Repositórios ou camadas bem definidas
- [x]  Código reutilizável
- [x]  Explique rapidamente **por que escolheu essa abordagem**.

---

## 🧠 Tomada de decisão (obrigatório)

Crie um arquivo `DECISOES.md` ou um comentário no código explicando:

- [x]  Como você modelou o banco de dados (Inclua a modelagem de Banco de Dados)
- [x]  Por que escolheu essa estrutura
- [x]  O que melhoraria se tivesse mais tempo

📌 Não precisa ser longo. Clareza é mais importante que volume.
