<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>


<?php 

    $bancoDados = abrir_bancoDados();


    if ($bancoDados) {
        # code...
        echo '<h1>Banco de Dados Conectado</h1>';
    } else {
        # code...
        echo '<h1>Erro: Não foi possível conectar!</h1>';
    }
    
?>