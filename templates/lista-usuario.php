<?
include_once 'includes/header.php';
$dao = new UsuarioDao();
$lista = $dao->listar("");


if(count($_GET)>0){
	$dao = new UsuarioDao();
	$valida = $dao->validaLig($_GET["id"]);
	
	
		if ($valida){
			echo '<div class="alert alert-danger" role="alert"> Este usuário pertence a um projeto ativo</div>';
		}else {
		$dao->excluir($_GET["id"]);
	
	header("Location: lista-usuario.php");
	echo '<div class="alert alert-danger" role="alert"> Usuario deletado com sucesso</div>';
	}
}
?>
			<!-- Row -->
<div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista Usuários 
                       </h1>
                    </div>
                </div>
                
                <!-- /.row -->
                <!-- Form -->
    <table id="example" class="table table-striped" >
  			<thead>
  			<tr>
				<th class="col-sm-2">Login</th>
				<th class="col-sm-2">Nome</th>
				<th class="col-sm-2">Email</th>
				<th class="col-sm-2">Fone</th>
				<th class="col-sm-2">Celular</th>
				<th class="col-sm-4">Operações</th>
				
			</tr>
			</thead>
			<tbody>
	<? foreach ($lista as $contador => $objeto){ ?>
	
				<tr>
					<td><?= $objeto->login ?></td>
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->email ?></td>
					<td><?= $objeto->telefone?></td>
					<td><?= $objeto->cel?></td>
					<!-- envia GET para alterar usuario -->
					<td><a href="altera-usuario.php
					?id=<?= $objeto->usuario_id?>
					&nome=<?= $objeto->nome ?>
					&email=<?= $objeto->email ?>
					&fone=<?= $objeto->telefone ?>
					&op=alterar" title="Alterar">
					<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"> | </i></a>
					<!-- Envia GET para excluir usuario -->
					<a href="lista-usuario-projeto.php
					?id=<?= $objeto->usuario_id ?>
					&op=listar" title="Usuários por projeto" ><i class="fa fa-user-plus fa-2x" aria-hidden="true"> | </i></a>
					<a href="lista-usuario.php
					?id=<?= $objeto->usuario_id ?>
					&op=excluir" data-toggle="confirmation" data-title="Tem certeza que deseja excluir?" data-btn-Cancel-Label="Melhor não!"
					data-btn-Ok-Label="Tenho certeza" data-singleton="true" data-btn-Ok-Class="btn-xs btn-success" 
					data-btn-Cancel-Class="btn-xs btn-danger" data-placement="left">
					<i class="fa fa-trash  fa-2x" aria-hidden="true"></i></a>
					</tr>
					<?} ?>
				</tbody>
    </table>
      <script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script> 
<?php 
include_once 'includes/footer.php';
?>