<?php
include_once 'includes/header.php';
$obj = ($_GET);

if((count($_POST)>0)){
	
	$get = Entidade::getObject($_POST);
	$dao = new UsuarioDao();
	$nome = $dao->validar($get->nome);
	
	if(($get->nome != $obj["nome"]) && $nome) {
	
		echo '<div class="alert alert-danger" role="alert">este nome ja existe</div> ';
	
	}
		else{
			$dao->alterar($get);
			header("Location: lista-usuario.php");
	
	}
}
?>
<!-- header -->
<div id="page-wrapper">
    <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Alterar Usuário 
                       </h1>
                    </div>
                </div>
	<form class="form-horizontal" name="form" action="" method="POST" id="altera-usuario">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" name="nome" class="form-control" id="nome" value="<?= $obj["nome"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="email" value="<?= $obj["email"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-10">
	      <input type="text" name="fone" class="form-control" id="fone" value="<?= $obj["fone"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Celular</label>
	    <div class="col-sm-10">
	      <input type="text" name="cel" class="form-control" id="phone" value="<?= $obj["cel"] ?>" required>
	    </div>
	  </div>
	  <div>
	    <div>
	      <input type="hidden" name="id" value="<?= $obj["id"]?>">
	    </div>
	  </div>
	 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Registrar</button>
	      <button type="reset" class="btn btn-danger">Apagar</button>
	    </div>
	  </div>
	</form>
</div>	
<?php include_once 'includes/footer.php';?>