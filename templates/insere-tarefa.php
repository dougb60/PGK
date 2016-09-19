<?php include_once 'includes/header.php';

$usu = new UsuarioDao();
$id = $usu->listar($usuario_logado);

$get = ($_GET);

$dao = new TarefaDao();
$tarefa = new InsereTarefaDao();
$lista = $dao->listar("");

$pdao = new ProjetoDao();

$validaD = $pdao->listaD($_GET["id"]);
foreach ($validaD as $key => $objeto){
	
}
if(count($_POST) > 0){
	
	
	$obj = Entidade::getObject($_POST);
	
	if ($objeto->pdini > $obj->dini || $objeto->pdfim < $obj->dfim ){
		echo '<div class="alert alert-danger" role="alert">A data de duração da tarefa deve se enquandrar dentro do prazo do projeto!
				</br>Inicio: '.$objeto->pdini = date("d/m/Y", strtotime ($objeto->pdini)).' a '.$objeto->pdfim = date("d/m/Y", strtotime ($objeto->pdfim)).'</div>';
	}else {
	$validar = $tarefa->validar($obj);
	if($validar){
		echo '<div class="alert alert-danger" role="alert">Esta tarefa ja foi atribuida a este projeto</div></br>';
		
	}else{
		if ($obj->dini > $obj->dfim){
			echo '<div class="alert alert-danger" role="alert">Verifique o prazo da sua tarefa';
		}else{
		
		$tarefa->inserir($obj);
		
		
		header('Location: lista-projeto-tarefa.php?id='.$get["id"].'&nome='.$get["nome"]);
		
		echo "tarefa inclusa";
		}
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
	      			<a href="lista-projeto.php" class="btn btn-danger">Voltar</a>
	    		</div>
	  		</div>
		</form>
	</div>
</div>

  <script>
	$(document).ready(function() {
    $('#example').DataTable({
			"info":false,
    		"language": {
           	"zeroRecords": "Nenhum registro encontrado",
		"search":"Busca: ",
		"paginate": {
			        "first": "Primeiro",
			        "last":  "Ultimo",
			        "next":  "Proximo",
			        "previous":   "Anterior"
			    },
			"info": "Mostrando _START_ à _END_ de _TOTAL_ entradas",
			"infoEmpty": "Mostrando 0 à 0 de 0 entradas",
			"lengthMenu": "Mostrar _MENU_ entradas",
				}
			});
	});
	</script>  
	        
<?php include_once 'includes/footer.php';?>