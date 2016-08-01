<?php 
	include_once 'includes/header.php';
	
	if(count($_POST) > 0){
	
		$obj = Entidade::getObject($_POST);
		$dao = new ProjetoDao();
		$nome = $dao->validar($obj->nome);
		$dump;
	
	
		if($nome) {
	
			echo "este nome ja existe <br>";
	
		}else {
			if ($obj->dini > $obj->dfim){
				echo "Verifique o prazo do seu projeto";
			}else{
				$dao->inserir($obj);
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
        <form class="form-horizontal" name="form" action="" method="POST" id="registra-projeto">
		  <div class="form-group">
		    <label for="nome" class="col-sm-2 control-label">Nome</label>
		    <div class="col-sm-6">
		      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
		    </div>
		  </div>
		  <div class="form-group">
		      <label for="desc" class="col-sm-2 control-label">Descrição</label>
		    <div class="col-sm-6">
		      <textarea name="descricao" class="form-control" id="desc" placeholder="Descreva seu projeto" required></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="dini" class="col-sm-2 control-label">Data de inicio</label>
		    <div class="col-sm-6">
		      <input type="date" name="dini" class="form-control" id="dini" placeholder="Inicio" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="dfim" class="col-sm-2 control-label">Prazo para fim</label>
		    <div class="col-sm-6">
		      <input type="date" name="dfim" class="form-control" id="dfim" placeholder="Fim" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <button type="submit" class="btn btn-primary">Registrar</button>
		      <button type="reset" class="btn btn-danger">Apagar</button>
		    </div>
		  </div>
	    </form>
                       
    </div>
</div>
<?php 
	include_once 'includes/footer.php';
?>
                