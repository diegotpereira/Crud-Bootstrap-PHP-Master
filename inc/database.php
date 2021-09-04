<?php 

mysqli_report(MYSQLI_REPORT_STRICT);

function abrir_bancoDados() {
    try {
        $conexao = new mysqli(host,nomeDeUsuarioBanco,senhaBanco,nomeDoBanco);

        return $conexao;
    } catch(Exception $e) {
        echo $e->getMessage();

        return null;
    }
}

?>