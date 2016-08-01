<?php
include_once 'includes/header.php';
$obj = ($_GET);

if((count($_POST)>0)){
	
	$get = Entidade::getObject($_POST);
	$dao = new UsuarioDao();
	$nome = $dao->validar($get->nome);
	
	if(($get->nome != $obj["nome"]) && $nome) {
	
		echo "este nome ja existe <br>";
	
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
                            Alterar Tarefa 
                       </h1>
                    </div>
                </div>
	<form class="form-horizontal" name="form" action="" method="POST">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-6">
	      <input type="text" name="nome" class="form-control" id="nome" value="<?= $obj["nome"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="descricao" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-6">
	      <input type="text" name="descricao" class="form-control" id="descricao" value="<?= $obj["email"] ?>" required>
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