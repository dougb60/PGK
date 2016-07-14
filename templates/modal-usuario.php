<?
include_once 'includes/header.php';
$dao = new UsuarioDao();
$lista = $dao->listar("");



?>

		<div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <h1 class="page-header">
                            Painel do Usuario 
                       </h1>
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#cadastra">Cadastrar Usuario</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#lista">Listar Usuarios</button>
                       
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div> 
 	<!-- Modal cadastra -->       
<div class="modal fade" id="cadastra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" name="form" action="cadastra-usuario.php" method="POST">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-10">
	      <input type="text" name="fone" class="form-control" id="fone" placeholder="Telefone" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-10">
	      <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="senha" class="col-sm-2 control-label">Senha</label>
	    <div class="col-sm-10">
	      <input type="password" name="senha" class="form-control" id="senha" placeholder="senha" required>
	    </div>
	  </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Registrar</button>
	      <button type="reset" class="btn btn-danger">limpar</button>
	    </div>
	  </div>
	</form>
      </div>
    </div>
  </div>
</div>
	<!-- Fim Modal Cadastra -->
	<!-- Modal Lista -->
  


<!-- Modal lista-->
<div class="modal fade" id="lista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Lista de Usuarios</h4>
      </div>
      <div class="modal-body">
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
					<td><?= $objeto->usuario_id ?></td>
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
					<td><a href="altera-usuario.php"
					?id=<?= $objeto->usuario_id ?>
					&op=excluir"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
					<?} ?>
					
				</tr>
					
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim modal lista --> 
<!-- Modal para alterar Usuario -->
	<!-- Logica Para alterar -->
	
	<!-- Fim da lógica para alterar -->
<div class="modal fade" id="altera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-dismiss="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" name="form" action="cadastra-usuario.php" method="POST">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="<?= $obj["nome"] ?>"] required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $obj["email"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-10">
	      <input type="text" name="fone" class="form-control" id="fone" placeholder="Telefone" value="<?= $obj["fone"] ?>" required>
	    </div>
	  </div>
	  <div>
	      <input type="hidden" name="id" value="<?= $obj["id"]?>">
	    </div>
	  </div>
      <div class="modal-footer">
        <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Registrar</button>
	      <button type="reset" class="btn btn-danger">limpar</button>
	    </div>
	  </div>
	</form>
      </div>
    </div>
  </div>

	
	

        
<?php 
include_once 'includes/footer.php';
?>