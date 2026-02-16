# 🗄️ Sistema CRUD Usuários

[]
[]
[]
[]
[]

> **Sistema completo de gerenciamento de usuários com operações CRUD utilizando apenas PHP puro, CSS e MySQL via phpMyAdmin. Projeto otimizado para portfólio profissional.**

## 📋 Sumário

- [📋 Descrição](#-descrição)
- [✨ Funcionalidades](#-funcionalidades)
- [🧱 Estrutura](#-estrutura)
- [🚀 Tecnologias](#-tecnologias)
- [⚙️ Pré-requisitos](#️-pré-requisitos)
- [🔧 Instalação](#-instalação)
- [📡 Páginas](#-páginas)
- [🗄️ Banco](#️-banco-de-dados)
- [🧪 Exemplos](#-exemplos)
- [🤝 Contribuição](#-contribuição)
- [📄 Licença](#-licença)
- [👨‍💻 Autor](#-autor)

***

## 📋 Descrição

Sistema web **full CRUD** para gerenciamento completo de usuários, desenvolvido com tecnologias nativas e leves:

- **PHP puro** (sem frameworks)
- **MySQL** via phpMyAdmin
- **CSS moderno** responsivo
- **Zero dependências externas**

<div align="center">
  <img src="https://via.placeholder.com/800x400/1e3a8a/60a5fa?text=CRUD+Usuarios+PHP+MySQL](https://www.rtek.com.br/wp-content/uploads/2016/12/sistema-empresarial.jpg" alt="Demo Sistema" width="100%">
</div>

***

## ✨ Funcionalidades

- ✅ **Criar** novos usuários
- ✅ **Listar** todos com paginação
- ✅ **Editar** dados existentes  
- ✅ **Excluir** com confirmação
- ✅ **Buscar** por nome/email
- ✅ **Responsivo** mobile-first
- ✅ **Validação** completa
- ✅ **phpMyAdmin** ready

***

## 🧱 Estrutura

```
banco_usuarios/
├── CRUD/
│   ├── index.php          # Listagem principal
│   ├── create.php         # Novo usuário
│   ├── edit.php          # Editar usuário
│   ├── delete.php        # Excluir usuário
│   ├── config.php        # Configuração DB
│   ├── css/
│   │   └── style.css     # Estilos
│   └── js/
│       └── main.js       # JavaScript vanilla
└── README.md
```

***

## 🚀 Tecnologias

| **Frontend** | **Backend** | **Database** |
|--------------|-------------|--------------|
| HTML5 | PHP 7.4+ | MySQL 5.7+ |
| CSS3 | PDO/MySQLi | phpMyAdmin |
| JavaScript | Sessions | |
| Bootstrap | Prepared Statements | |

***

## ⚙️ Pré-requisitos

```bash
# Stack mínima necessária:
- PHP 7.4+
- MySQL 5.7+ 
- phpMyAdmin
- Apache/Nginx
- Navegador moderno
```

**Zero Composer, zero frameworks, zero dependências!**

***

## 🔧 Instalação

### 1. Copiar para servidor

```bash
# XAMPP: htdocs/banco_usuarios/CRUD/
# WAMP: www/banco_usuarios/CRUD/
# Laragon: www/banco_usuarios/CRUD/
```

### 2. Criar banco (phpMyAdmin)

```sql
CREATE DATABASE portfolio;
USE portfolio;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 3. Configurar `config.php`

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'root');
define('DB_PASS', '');
?>
```

### 4. Acessar

```
http://localhost/banco_usuarios/CRUD/
```

***

## 📡 Páginas do Sistema

| Página | Método | Função | Parâmetros |
|--------|--------|--------|------------|
| `index.php` | GET | Listar todos | `?busca=termo` |
| `create.php` | GET/POST | Criar novo | - |
| `edit.php` | GET/POST | Editar | `?id=1` |
| `delete.php` | GET/POST | Excluir | `?id=1` |

***

## 🗄️ Banco de Dados

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_nome (nome),
    INDEX idx_email (email)
);
```

<details>
<summary>📊 Dados de teste</summary>

```sql
INSERT INTO usuarios (nome, email, telefone) VALUES
('João Silva', 'joao@email.com', '(51) 99999-1111'),
('Maria Santos', 'maria@email.com', '(51) 99999-2222'),
('Pedro Oliveira', 'pedro@email.com', '(51) 99999-3333');
```

</details>

***

## 🧪 Exemplos de Uso

### 1. Listagem + Busca

```php
// index.php
$busca = $_GET['busca'] ?? '';
$sql = "SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(["%$busca%", "%$busca%"]);
```

### 2. Criar usuário

```php
// create.php (POST)
$stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone) VALUES (?, ?, ?)");
$stmt->execute([$nome, $email, $telefone]);
```

### 3. Deletar

```php
// delete.php
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
```

***

## 🤝 Como Contribuir

1. Fork o projeto
2. Crie branch: `git checkout -b minha-melhoria`
3. Commit: `git commit -m 'Adiciona X'`
4. Push: `git push origin minha-melhoria`
5. 📤 Pull Request

***

## 📄 Licença

[Licença MIT](LICENSE) - Veja o arquivo [LICENSE](LICENSE) para detalhes.

***

## 👨‍💻 Autor

<div align="center">

**Cassi Branch**

[
[
[

**💻 Desenvolvedor Full Stack | PHP & MySQL**

</div>

***

<div align="center">

**⭐ Star se gostou do projeto!**  


</div>

***

