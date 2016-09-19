<?
include_once 'includes/header.php';

$get = ($_GET);

$dao = new UsuarioDao();

$lista = $dao->listar("");

if(count($_POST) > 0){

	$obj = Entidade::getObject($_POST);
	
	
	$validar = $dao->validaLig($obj);
	if ($validar){
		echo '<div class="alert alert-danger" role="alert">Esta tarefa já esta vinculada a este usuário</div>';
	}else {
		$teste = $dao->insereTP($obj);
		echo "Usuário incluso com sucesso";
		header('Location: lista-projeto-tarefa.php?id='.$get["projid"].'&nome='.$get["projeto"]);
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
                           Designar Tarefa 
                       </h1>
                    </div>
                </div>
		<form class="form-horizontal" name="form" action="" method="POST">
	  		<div class="form-group">
	    		<label for="nome" class="col-sm-3 control-label">Projeto </label>
	    		<div class="col-sm-6">
	      			<input type="text" name="projeto" class="form-control" id="nome" value="<?= $get["projeto"] ?>" disabled="disabled">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label for="nome" class="col-sm-3 control-label">Tarefa </label>
	    		<div class="col-sm-6">
	      			<input type="text" name="tarefa" class="form-control" id="nome" value="<?= $get["tarefa"] ?>" disabled="disabled">
	    		</div>
	  		</div>
	    			<input type="hidden" name="projid" value="<?= $get["projid"]?>">
	    			<input type="hidden" name="tarid" value="<?= $get["tarid"]?>">
	    	<div class="form-group">
	  				<div class="col-sm-offset-3 col-sm-6">
		  				<table id="example" class="table table-striped" >
			  				<thead>
			  					<tr>
				  					<th>Nome</th>
				  					<th>Login</th>
				  					<th>Tipo</th>
				  					<th>Inserir</th>
			  					</tr>
			  				</thead>
			  				<tbody>
			  					<?
				 				/*Preenche table com tarefa*/
				 				foreach ($lista as $contador => $objeto){ ?>
				 				
				 					
			  					<tr>
			  						<td><?= $objeto->nome?></td>
			  						<td><?= $objeto->login?></td>
			  						<td><?= $objeto->tipo?></td>
			  						<td><input type="radio" name="usuid" value="<?= $objeto->usuario_id?>" required></td>
			  					</tr>
			  					<?}?>
			  				</tbody>
			  			</table>
			  		</div>
		  		</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-3 col-sm-6">
	      			<button type="submit" class="btn btn-primary">Registrar</button>
	    		</div>
	  		</div>
		</form>
		<script>
		$(document).ready(function() {
    	$('#example').DataTable({
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
<? include_once 'includes/footer.php';?>