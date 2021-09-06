<?php 

    require_once('../config.php');
    require_once(DBAPI);

    $clientes = null;
    $cliente = null;

    // Listagem de Clientes
    function index() {
        global $clientes;
        $clientes = find_all('clientes');
    }

    // Função visualização de um cliente
    function mostrar($id = null) {

        global $cliente;
        $cliente = find('clientes', $id);
    }

    // Função cadastrar  pessoas
    function adicionar() {
        if (!empty($_POST['cliente'])) {
            # code...
            $today =  date_create('now', new DateTimeZone('America/Sao_Paulo'));

            $cliente = $_POST['cliente'];
            $cliente['modified'] = $cliente['created'] = $today->format("Y-m-d H:i:s");

            salvar('clientes', $cliente);
            header('location: index.php');
        }
    }
    // Atualização e edição de cliente
    function editar() {

        $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

        if (isset($_GET['id'])) {
            # code...
            $id = $_GET['id'];

            if (isset($_POST['cliente'])) {
                # code...
                $cliente = $_POST['cliente'];
                $cliente['modified'] = $now->format("Y-m-d H:i:s");

                atualizar('clientes', $id, $cliente);
                header('location: index.php');
            } else {
                # code...
                global $cliente;
                $cliente = find('clientes', $id);
            }
            
        }else{
    
            header('location : index.php');
            
        }
    }

    // Função de exclusão de um cliente
    function deletar($id = null) {
        global $cliente;
        $cliente = remover('clientes', $id);

        header('location: index.php');
    }

?>