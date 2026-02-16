# 🏢 Sistema CRUD Empresas & Usuários

[
[
[
[
[

> **Sistema completo de gerenciamento de empresas e usuários com operações CRUD avançadas. Implementa relacionamentos, validações e arquitetura limpa para portfólio profissional.**

## 📋 Sumário

- [📋 Descrição do Projeto](#-descrição-do-projeto)
- [✨ Funcionalidades](#-funcionalidades)
- [🧱 Estrutura do Projeto](#-estrutura-do-projeto)
- [🚀 Tecnologias](#-tecnologias)
- [⚙️ Pré-requisitos](#️-pré-requisitos)
- [🔧 Instalação](#-instalação)
- [📡 Endpoints](#-endpoints)
- [🗄️ Banco de Dados](#️-banco-de-dados)
- [🧪 Exemplos de Uso](#-exemplos-de-uso)
- [🤝 Contribuição](#-contribuição)
- [📄 Licença](#-licença)
- [👨‍💻 Autor](#-autor)

***

## 📋 Descrição do Projeto

Sistema web full-stack para gerenciamento completo de **empresas** e seus **usuários**. Implementa todas as operações CRUD com relacionamentos 1:N, validação de dados, autenticação segura e interface responsiva.

<div align="center">
  <img src="https://via.placeholder.com/900x450/0a0e17/8b5cf6?text=Sistema+CRUD+Empresas+%26+Usuários" alt="Demo do Sistema" width="100%">
</div>

> **Perfeito para demonstrar habilidades em desenvolvimento web full-stack com foco em arquitetura limpa e boas práticas.**

***

## ✨ Funcionalidades

✅ **Empresas**
- Cadastro, edição, visualização e exclusão
- Status (ativa/inativa)
- Dados fiscais (CNPJ, razão social)

✅ **Usuários**
- CRUD completo vinculado a empresas
- Perfis de acesso
- Validação de email único por empresa

✅ **Recursos Avançados**
- Relacionamento 1:N (empresa → usuários)
- Busca e filtros avançados
- Paginação inteligente
- Upload de logo da empresa
- Exportação CSV/PDF

***

## 🧱 Estrutura do Projeto

```
projeto-crud-empresas-usuarios/
├── src/
│   ├── config/
│   │   ├── database.php      # Configuração PDO
│   │   └── auth.php          # Autenticação
│   ├── controllers/
│   │   ├── EmpresaController.php
│   │   └── UsuarioController.php
│   ├── models/
│   │   ├── Empresa.php
│   │   └── Usuario.php
│   ├── views/
│   │   ├── empresas/
│   │   └── usuarios/
│   └── assets/
│       ├── css/
│       ├── js/
│       └── images/
├── public/
│   ├── index.php            # Roteador principal
│   ├── empresas.php         # Listagem empresas
│   └── usuarios.php         # Listagem usuários
├── database/
│   └── schema.sql          # Script SQL completo
└── README.md
```

***

## 🚀 Tecnologias

| **Frontend** | **Backend** | **Database** | **Ferramentas** |
|--------------|-------------|--------------|-----------------|
| HTML5 | PHP 7.4+ | MariaDB 10.4+ | Git |
| CSS3/SCSS | PDO/MySQLi | MySQL 5.7+ | Composer |
| JavaScript ES6+ | MVC Pattern | | Xdebug |
| Bootstrap 5 | Sessions | | PHPMailer |
| jQuery/Ajax | Validation | | |

***

## ⚙️ Pré-requisitos

```bash
PHP >= 7.4 com extensões:
├── pdo_mysql
├── mysqli
└── session

Banco de dados:
├── MariaDB 10.4+ OU
└── MySQL 5.7+

Servidor Web:
├── Apache 2.4+ OU
├── Nginx 1.18+ OU
└── PHP Built-in Server
```

***

## 🔧 Instalação

### 1. Clonar Repositório

```bash
git clone https://github.com/SEU_USUARIO/sistema-crud-empresas-usuarios.git
cd sistema-crud-empresas-usuarios
```

### 2. Configurar Banco

```sql
-- Criar database
CREATE DATABASE empresas_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Importar schema
source database/schema.sql
```

### 3. Configurar Ambiente

Edite `src/config/database.php`:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'empresas_crud');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
?>
```

### 4. Executar

```bash
# XAMPP/WAMP: Copie para htdocs/
# Acesse: http://localhost/sistema-crud-empresas-usuarios/public/

# PHP Built-in:
php -S localhost:8000 -t public/
```

***

## 📡 Endpoints / Rotas

| Método | Rota | Ação | Parâmetros |
|--------|------|------|------------|
| GET | `/empresas` | Listar empresas | `?search=term&status=ativo&page=1` |
| GET | `/empresas/novo` | Novo empresa | - |
| POST | `/empresas/salvar` | Criar empresa | `nome,cnpj,logo` |
| GET | `/empresas/editar?id=X` | Editar | `id` |
| POST | `/empresas/atualizar` | Atualizar | `id,nome,cnpj` |
| POST | `/empresas/excluir` | Deletar | `id` |
| GET | `/usuarios?empresa=X` | Listar usuários | `empresa_id` |

***

## 🗄️ Banco de Dados

### Tabelas Principais

```sql
-- Empresas
CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cnpj VARCHAR(18) UNIQUE NOT NULL,
    razao_social VARCHAR(200),
    status ENUM('ativa','inativa') DEFAULT 'ativa',
    logo_path VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_cnpj (cnpj),
    INDEX idx_status (status)
);

-- Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    perfil ENUM('admin','user') DEFAULT 'user',
    ativo BOOLEAN DEFAULT TRUE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (empresa_id) REFERENCES empresas(id) ON DELETE CASCADE,
    UNIQUE KEY unique_empresa_email (empresa_id, email),
    INDEX idx_empresa (empresa_id)
);
```

<details>
<summary>🔍 Dados de Exemplo</summary>

```sql
-- Empresas de exemplo
INSERT INTO empresas (nome, cnpj, razao_social) VALUES
('Tech Solutions LTDA', '12.345.678/0001-99', 'Tech Solutions Ltda'),
('MarketPlace Digital', '98.765.432/0001-10', 'MarketPlace Digital ME'),
('Consultoria ABC', '11.222.333/0001-44', 'Consultoria ABC Ltda');

-- Usuários exemplo
INSERT INTO usuarios (empresa_id, nome, email, perfil) VALUES
(1, 'João Silva', 'joao@techsolutions.com', 'admin'),
(1, 'Maria Santos', 'maria@techsolutions.com', 'user'),
(2, 'Pedro Costa', 'pedro@marketplace.com', 'admin');
```

</details>

***

## 🧪 Exemplos de Uso

### 1. Criar Empresa (Formulário)

```html
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nome" placeholder="Nome da Empresa" required>
    <input type="text" name="cnpj" placeholder="12.345.678/0001-99" required>
    <input type="file" name="logo">
    <button type="submit">Salvar Empresa</button>
</form>
```

### 2. Listar Usuários por Empresa

```php
// Controller exemplo
$empresa_id = $_GET['empresa'] ?? 1;
$usuarios = $pdo->query("
    SELECT * FROM usuarios 
    WHERE empresa_id = $empresa_id 
    ORDER BY nome
")->fetchAll();
```

### 3. Resposta AJAX

```json
{
    "success": true,
    "message": "Empresa criada com sucesso!",
    "data": {
        "id": 5,
        "nome": "Nova Empresa LTDA",
        "cnpj": "12.345.678/0001-99"
    }
}
```

***

## 🤝 Como Contribuir

1. **Fork** o projeto
2. Crie **branch** com a funcionalidade: `git checkout -b feature/nova-funcionalidade`
3. **Commit** suas mudanças: `git commit -m 'Adiciona nova funcionalidade'`
4. **Push** para branch: `git push origin feature/nova-funcionalidade`
5. Abra **Pull Request**

```bash
# Exemplo de boas mensagens de commit
git commit -m "feat: adiciona upload de logo da empresa"
git commit -m "fix: corrige validação de CNPJ duplicado"
git commit -m "docs: atualiza documentação dos endpoints"
```

***

## 📄 Licença

Este projeto está sob a [Licença MIT](LICENSE). Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

***

## 👨‍💻 Autor

<div align="center">

**👤 Seu Nome Aqui**

[
[
[

**💻 Desenvolvedor Full Stack | Especialista em Arquitetura Web**

</div>

***

<div align="center">

[
  
**⭐ Dê uma estrela se gostou do projeto!**



</div>