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

        $bancoDados =  abrir_bancoDados();
        $columns = null;
        $values = null;

        foreach($data as $key => $value) {

            $columns .= trim($key, "'") . ",";

            if (strpos($value, '/') !== false) {
                $value = strtr($value, '/', '-');
                $value = date('Y-m-d', strtotime($value));
            }

            $value = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $value);
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

        $bancoDados = abrir_bancoDados();

        $items = null;

        foreach($data as $key => $value) {
            $items .= trim($key, "'")."='$value',";
        }

        // remove a ultima virgula
        $items = rtrim($items, ',');

        $sql  = "UPDATE " . $table;
        $sql .= " SET $items";
        $sql .= " WHERE id=" . $id . ";";

        try {
            //code...
            $bancoDados->query($sql);


            $_SESSION['message'] = "Registro atualizado com sucesso.";
            $_SESSION['type'] = 'success';

        } catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possível realizar a operação.';
            $_SESSION['type'] = 'danger';
        }

        fechar_bancoDados($bancoDados);
    }

    // Remove uma linha de uma tabel pelo ID do registro
    function remover($table = null, $id = null) {

        $bancoDados = abrir_bancoDados();

        try {
            
            if ($id) {
                # code...
                $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
                $result = $bancoDados->query($sql);

                if ($result = $bancoDados->query($sql)) {
                    $_SESSION['message'] = "Registro removido com sucesso.";
                    $_SESSION['type'] = 'success';
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] =  $e->getMessage();
            $_SESSION['type'] = 'danger';
        }

        fechar_bancoDados($bancoDados);
    }
?>