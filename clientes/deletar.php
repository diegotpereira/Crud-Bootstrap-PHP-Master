<?php 

  require_once('funcoes.php');

  if (isset($_GET['id'])) {
      # code...
      deletar($_GET['id']);
  } else {
      # code...
      die("Erro: ID não definido.");
  }
?>