<?php 

require_once('funcoes.php');

index();

?>

<?php include(HEADER_TEMPLATE); ?>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Clientes</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="adicionar.php"><i class="fa fa-plus">Novo Cliente</i></a>
            <a class="btn btn-default" href="index.php"><i class="fa fa-refresh">Atualizar</i></a>
        </div>
    </div>
</header>
<?php if(!empty($_SESSION['message'])) : ?>

    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
     
<?php endif; ?>

<hr>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Nome</th>
            <th>CPF/CNPJ</th>
            <th>Telefone</th>
            <th>Atualizado em</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($clientes) : ?>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td><?php  echo $cliente['id']; ?></td>
                <td><?php  echo $cliente['nome']; ?></td>
                <td><?php  echo $cliente['cpf_cnpj']; ?></td>
                <td><?php  echo $cliente['telefone']; ?></td>
                <td><?php  echo $cliente['modified']; ?></td>
                <td class="actions text-right">
                    <a href="mostrar.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>Visualizar</a>
                    <a href="atualizar.php?id=<?php echo $cliente['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i>Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-cliente="<?php echo $cliente['id']; ?>"><i class="fa fa-trash"></i>Excluir
                    </a>
                </td>
            </tr>
<?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="6">Nenhum redistro encontrado.</td>

    </tr>
<?php endif; ?>    
    </tbody>
</table>

<?php include('modal.php'); ?>
<?php include(FOOTER_TEMPLATE); ?>