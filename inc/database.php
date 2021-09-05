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

    // Pesquisa um registro pelo ID em uma tabela
    function find($table = null, $id = null) {

        $bancoDados = abrir_bancoDados();
        $found = null;

        try {
            //code...
            if ($id) {
                # code...
                $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
                $result = $bancoDados->query($sql);

                if ($result->num_rows > 0) {
                    # code...
                    $found = $result->fetch_assoc();
                }
            }else{
                $sql = "SELECT * FROM " . $table;
                $result = $bancoDados->query($sql);

                if ($result->num_rows > 0) {
                    # code...
                    $found = $result->fetch_all(MYSQLI_ASSOC);
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] = $e->GetMessage();
            $_SESSION['type'] = 'danger';
        }

        fechar_bancoDados($bancoDados);
        return $found;
    }


    // Pesquisa todos os registros de uma tabela
    function find_all($table) {
        return find($table);
    }

    function fechar_bancoDados($conexao) {
        try {
            //code...
            mysqli_close($conexao);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function salvar($table = null, $data = null) {

        echo ("chegou aqui no salvar");
        $bancoDados =  abrir_bancoDados();

        $columns = null;
        $values = null;

        foreach($data as $key => $value) {
            $columns .= trim($key, "'") . ",";
            $values .= "'$value',";
        }

        // remove a ultima virgula
        $columns = rtrim($columns, ',');
        $values = rtrim($values, ',');

        $sql = "INSERT INTO " . $table . "($columns)"  . " VALUES " . "($values);";

        try {
            //code...
            $bancoDados->query($sql);

            $_SESSION['message'] = 'Registro cadastrado com sucesso.';
            $_SESSION['type'] = 'success';
            
        } catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possível  realizar a operação.';
            $_SESSION['type'] = 'danger';
        }

        fechar_bancoDados($bancoDados);
    }

    // Atualiza um registro em uma tabela, por ID
    function atualizar($table = null, $id = 0, $data = null) {

        echo("Chegou aqui no data base atualizar");

        $bancoDados = abrir_bancoDados();

        $items = null;

        foreach($data as $key => $value) {
            $items .= trim($key, "'")."='$value',";
        }

        // remove a ultima virgula
        $sql  = "UPDATE " . $table;
        $sql .= " SET $items";
        $sql .= " WHERE id=" . $id . ";";
        echo("Chegou aqui no update atualizar");

        try {
            //code...
            $bancoDados->query($sql);
            echo("Chegou aqui no try/catch atualizar");

            $_SESSION['message'] = "Registro atualizado com sucesso.";
            $_SESSION['type'] = 'success';

        } catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possível realizar a operação.';
            $_SESSION['type'] = 'danger';
        }

        fechar_bancoDados($bancoDados);
    }
?>