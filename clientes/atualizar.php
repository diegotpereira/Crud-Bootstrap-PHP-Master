<?php
  require_once('funcoes.php');
  editar();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Novo Cliente</h2>

<form action="atualizar.php?id=<?php echo $cliente['id']; ?>" method="post">
    <!-- campor do from --->
    <hr/>
    <div class="row">
        <div class="form-group col-md-7">
            <label for="nome">Nome / Razão Social</label>
            <input type="text" class="form-control" name="cliente['nome']" value="<?php echo $cliente['nome']; ?>">
        </div>
    
        <div class="form-group col-md-3">
            <label for="cpf_cnpj">CNPJ / CPF</label>
            <input type="text" name="cliente['cpf_cnpj']" class="form-control" value="<?php echo $cliente['cpf_cnpj']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="dataNascimento">Data de Nascimento</label> 
            <input type="text" name="cliente['dataNascimento']" class="form-control" id="" value="<?php echo $cliente['dataNascimento']; ?>">
        </div>
    </div>    
    <div class="row">
        <div class="form-group col-md-5">   
            <label for="endereco">Endereço</label>
            <input type="text" name="cliente['endereco']" class="form-control" id="" value="<?php echo $cliente['endereco']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="bairro">Bairro</label>
            <input type="text" name="cliente['bairro']" class="form-control" id="" value="<?php echo $cliente['bairro']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="cep">Cep</label>
            <input type="text" name="cliente['cep']" class="form-control" id="" value="<?php echo $cliente['cep']; ?>">
        </div>
        <div class="form-group col=md-2">
            <label for="dataCadastro">Data de Cadastro</label>
            <input type="text" name="cliente['created']" class="form-control" id="" disabled value="<?php echo $cliente['created']; ?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="municipio">Múnicipio</label>
            <input type="text" name="cliente['cidade']" class="form-control" id="" value="<?php echo $cliente['cidade']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="text" name="cliente['telefone']" class="form-control" id="" value="<?php echo $cliente['telefone']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="celular">Celular</label>
            <input type="text" name="cliente['celular']" class="form-control" id="" value="<?php echo $cliente['celular']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inscricaoEstadual">Inscrição Estadual</label>
            <input type="text" name="cliente['inscricaoEstadual']" class="form-control" id="" value="<?php echo $cliente['inscricaoEstadual']; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="uf">UF</label>
            <input type="text" name="cliente['estado']" class="form-control" id="" value="<?php echo $cliente['estado']; ?>">
        </div>
    </div>

    <div class="row" id="actions">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>  