<?php 
	include_once 'includes/header.php';
	
	$obj = ($_GET);
	
	if((count($_POST)>0)){
	
		$get = Entidade::getObject($_POST);
		$dao = new ProjetoDao();
		$nome = $dao->validar($get->nome);
	
		if(($get->nome != $obj["nome"]) && $nome) {
	
			echo "este nome ja existe <br>";
	
		}else {
			if ($get->dini > $get->dfim){
				echo "Verifique o prazo do seu projeto";
			}else{
				$dao->alterar($get);
				header("Location: lista-projeto.php");
	
			}
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
                            Cadastrar Projeto 
                       </h1>
                    </div>
                </div>
          <h1 class="page-header">Alterar Projeto</h1>
		  <form class="form-horizontal" name="form" action="" method="POST">
	  	  	<div class="form-group">
	    		<label for="nome" class="col-sm-2 control-label">Nome</label>
	    			<div class="col-sm-10">
	      				<input type="text" name="nome" class="form-control" id="nome" value="<?= $obj["nome"] ?>" required>
	    			</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="descricao" class="col-sm-2 control-label">Descrição</label>
	    		<div class="col-sm-10">
	      			<input type="text" name="descricao" class="form-control" id="descricao" value="<?= $obj["desc"] ?>" required>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="dini" class="col-sm-2 control-label">Data inicial</label>
	    		<div class="col-sm-10">
	      			<input type="date" name="dini" class="form-control" id="dini" value="<?= $obj["dini"] ?>" required>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="dfim" class="col-sm-2 control-label">Data Final</label>
	    		<div class="col-sm-10">
	      			<input type="date" name="dfim" class="form-control" id="dfim" value="<?= $obj["dfim"] ?>" required>
	    		</div>
	  		</div>
	  	    <div>
	        	<input type="hidden" name="id" value="<?= $obj["id"]?>">
	    	</div>
	  	 	<div class="form-group">
	    		<div class="col-sm-offset-2 col-sm-10">
	      		<button type="submit" class="btn btn-primary">Registrar</button>
	      		<button type="reset" class="btn btn-danger">Apagar</button>
	    		</div>
	  		</div>
		</form>
	</div>
</div>	
<?php include_once 'includes/footer.php';?>