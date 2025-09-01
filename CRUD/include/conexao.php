<?php
// Constantes de conexão com o banco (DB - DataBase)
define('DBSERVER', 'localhost'); // endereço do servidor
define('DBUSER', 'root'); // usuário de acesso ao MySQL
define('DBPASS', ''); // senha de acesso ao MySQL
define('DBBASE', 'empresa'); // nome da base de banco de dados

// Variável de conexão com o banco de dados
$conexao = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBBASE);

