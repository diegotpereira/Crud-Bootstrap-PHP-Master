<?php 
   require_once('funcoes.php');
   mostrar($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>CLiente <?php echo $cliente['id']; ?></h2>
<hr>

<?php if(!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
    <dt>Nome / Razão Social: </dt>
    <dd><?php echo $cliente['nome']; ?></dd>

    <dt>CPF / CNPJ: </dt>
    <dd><?php echo $cliente['cpf_cnpj']; ?></dd>

    <dt>Data de Nascimento: </dt>
    <dd><?php echo $cliente['dataNascimento']; ?></dd>
</dl>

<dl class="dl-horizontal">
    <dt>Endereço: </dt>
    <dd><?php echo $cliente['endereco']; ?></dd>

    <dt>Bairro: </dt>
    <dd><?php echo $cliente['bairro']; ?></dd>

    <dt>Cep: </dt>
    <dd><?php echo $cliente['cep']; ?></dd>

    <dt>Data de Cadastro: </dt>
    <dd><?php echo $cliente['created']; ?></dd>
</dl>

<dl class="dl-horizontal">
    <dt>Cidade: </dt>
    <dd><?php echo $cliente['cidade']; ?></dd>

    <dt>Telefone: </dt>
    <dd><?php echo $cliente['telefone']; ?></dd>

    <dt>Celular: </dt>
    <dd><?php echo $cliente['celular']; ?></dd>

    <dt>UF: </dt>
    <dd><?php echo $cliente['estado']; ?></dd>

    <dt>Inscrição Estadual: </dt>
    <dd><?php echo $cliente['inscricaoEstadual']; ?></dd>
</dl>

<div class="row" id="actions">
    <div class="col-md-12">
        <a href="atualizar.php?id=<?php echo $cliente['id']; ?>" class="btn btn-primary">Editar</a>
        <a href="index.php" class="btn btn-default">Voltar</a>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>