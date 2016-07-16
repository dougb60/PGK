<?
include_once 'includes/header.php';
$dao = new UsuarioDao();
$lista = $dao->listar("");



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
    <table class="table table-striped">
  			
  			<tr>
				<th>Registro</th>
				<th>Login</th>
				<th>Nome</th>
				<th>Email</th>
				<th>Fone</th>
				<th>Alterar</th>
				<th>Excluir</th>
				
			</tr>
	<? foreach ($lista as $contador => $objeto){ ?>
				<tr>
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->login ?></td>
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->email ?></td>
					<td><?= $objeto->telefone?></td>
					<!-- envia GET para alterar usuario -->
					<td><a href="#
					?id=<?= $objeto->usuario_id?>
					&nome=<?= $objeto->nome ?>
					&email=<?= $objeto->email ?>
					&fone=<?= $objeto->telefone ?>
					&op=alterar" >
					<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
					<!-- Envia GET para excluir usuario -->
					<td><a href="altera-usuario.php
					?id=<?= $objeto->usuario_id ?>
					&op=excluir"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
					
					</tr>
					<?} ?>
					
				
    </table>
<?php 
include_once 'includes/footer.php';
?>