<?php include_once 'includes/header.php';

$usu = new UsuarioDao();
$id = $usu->listar($usuario_logado);

$get = ($_GET);

$dao = new TarefaDao();
$tarefa = new InsereTarefaDao();
$lista = $dao->listar("");
if(count($_POST) > 0){

	$obj = Entidade::getObject($_POST);
	
	
	$validar = $tarefa->validar($obj);
	if($validar){
		echo "Esta tarefa ja foi atribuida a este projeto";
		//var_dump($obj);die();
	}else{
		if ($obj->dini > $obj->dfim){
			echo "Verifique o prazo da sua tarefa";
		}else{
		
		$tarefa->inserir($obj);
		
		
		header('Location: lista-projeto-tarefa.php?id='.$get["id"]);
		
		echo "tarefa inclusa";
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
                            Incluir Tarefa 
                       </h1>
                    </div>
                </div>
    	
		<form class="form-horizontal" name="form" action="" method="POST">
	  		<div class="form-group">
	    		<label for="nome" class="col-sm-3 control-label">Nome Projeto</label>
	    		<div class="col-sm-6">
	      			<input type="text" name="nome" class="form-control" id="nome" value="<?= $get["nome"] ?>" disabled="disabled">
	    		</div>
	  		</div>
	  
	  		<!--<div class="form-group">
	      		<label for="tarefa" class="col-sm-3 control-label">Inserir Tarefa</label>
	    			<div class="col-sm-6">
	      				  <select name="tarefa" class="form-control" id="tarefa" >
							
	      				</select>
	    			</div>
	  		</div>-->
	  		<div class="form-group">
	    		<label for="dini" class="col-sm-3 control-label">Data de inicio</label>
	    		<div class="col-sm-6">
	      			<input type="date" name="dini" class="form-control" id="dini" placeholder="Inicio" required>
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="dfim" class="col-sm-3 control-label">Prazo para fim</label>
	    		<div class="col-sm-6">
	      			<input type="date" name="dfim" class="form-control" id="dfim" placeholder="Fim" required>
	    		</div>
	    			<input type="hidden" name="id" value="<?= $get["id"]?>">
	  		</div>
	  			<div class="form-group">
	  				<div class="col-sm-offset-3 col-sm-6">
		  				<table id="example" class="table table-striped" >
			  				<thead>
			  					<tr>
				  					<th>Nome</th>
				  					<th>Descrição</th>
				  					<th>Inserir</th>
			  					</tr>
			  				</thead>
			  				<tbody>
			  					<?
				 				/*Preenche table com tarefa*/
				 				foreach ($lista as $contador => $objeto){ ?>
				 				
				 					
			  					<tr>
			  						<td><?= $objeto->nome?></td>
			  						<td><?= $objeto->descricao?></td>
			  						<td><input type="radio" name="tarefa" value="<?= $objeto->tarefas_id?>" required></td>
			  					</tr>
			  					<?}?>
			  				</tbody>
			  			</table>
			  		</div>
		  		</div>
		  		<? foreach ($id as $key => $objeto){
		    	
		    	}?>
		    <input type="hidden" name="usuid" class="form-control"  value="<?= $objeto->usuario_id;?>">
	  		<div class="form-group">
	    		<div class="col-sm-offset-3 col-sm-6">
	      			<button type="submit" class="btn btn-primary">Registrar</button>
	      			<button type="reset" class="btn btn-danger">Apagar</button>
	    		</div>
	  		</div>
		</form>
	</div>
</div>

  <script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script>  
	        
<?php include_once 'includes/footer.php';?>