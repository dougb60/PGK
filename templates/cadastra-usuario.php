<?
include_once 'includes/header.php';
$dao = new UsuarioDao();
$lista = $dao->listar("");



?>

<div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cadastrar Usuários 
                       </h1>
                        
                       
                    </div>
                </div>
                
                <!-- /.row -->
                <!-- Form -->
    <form class="form-horizontal" name="form" action="cadastra-usuario.php" method="POST">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-6">
	      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-6">
	      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-6">
	      <input type="text" name="fone" class="form-control" id="fone" placeholder="Telefone" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="login" class="col-sm-2 control-label">Login</label>
	    <div class="col-sm-6">
	      <input type="text" name="login" class="form-control" id="login" placeholder="Login" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="senha" class="col-sm-2 control-label">Senha</label>
	    <div class="col-sm-6">
	      <input type="password" name="senha" class="form-control" id="senha" placeholder="senha" required>
	    </div>
	  </div>
      
     
        <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Registrar</button>
	      <button type="reset" class="btn btn-danger">limpar</button>
	    </div>
	  </div>
	</form>
                <!-- /Form -->
            </div>
        </div> 
        
<?php 
include_once 'includes/footer.php';
?>