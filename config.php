<?php

// Nome do banco de dados
define('nomeDoBanco', 'bd_crud_bootstrap_php');

// Nome de Usuário do banco
define('nomeDeUsuarioBanco', 'root');

define('senhaBanco', 'root');

// Nome Host
define('host', 'localhost');

// caminho absoluto para pasta do sistema
if (!defined('ABSPATH')) 
    # code...
    define('ABSPATH', dirname(__FILE__). '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/Crud-Bootstrap-PHP-Master/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

// caminhos dos templates de header e footer
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
?>