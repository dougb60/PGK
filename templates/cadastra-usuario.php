<?php
include_once 'includes/header.php';
if(count($_POST) > 0){
	 
	$obj = Entidade::getObject($_POST);
	$dao = new UsuarioDao();
	$nome = $dao->validar($obj->login);
	
	
	if ($nome){
		echo "Este Login já existe";
	}else {
		$teste  = $dao->inserir($obj);
		
		header("Location: lista-usuario.php");
		//var_dump();
	}
	
	


}
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
    <form class="form-horizontal" name="form" action="" method="POST" id="registra-pessoa">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-6">
	      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
	    </div>
	  </div>
	<div class="form-group">
	    <label for="text" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-6">
	      <input type="text" name="email" class="form-control" id="email" placeholder="Email" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-6">
	      <input type="text" name="fone" class="form-control" id="fone" placeholder="ex:(99)9999-9999" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="cel" class="col-sm-2 control-label">Celular</label>
	    <div class="col-sm-6">
	      <input type="text" name="cel" class="form-control" id="cel" placeholder="ex:(99)9 9999-9999" required>
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
	    <label for="senha2" class="col-sm-2 control-label">Repita a senha</label>
	    <div class="col-sm-6">
	      <input type="password" name="senha2" class="form-control" id="senha2" placeholder="Repita a senha" required>
	    </div>
	  </div>
      
     
        <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary" id="submit-button">Registrar</button>
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