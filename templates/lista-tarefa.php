<?
	include_once 'includes/header.php';
	
	if(count($_GET)>0){
		$dao = new TarefaDao();
		$teste = $dao->excluir($_GET["id"]);
		
		echo "Tarefa deletada com sucesso";
	}
	
	$dao = new TarefaDao();
	
	$lista = $dao->listar("");
?>

		<div id="page-wrapper">
	            <div class="container-fluid">
	
	                <!-- Page Heading -->
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            Lista Tarefas 
	                       </h1>
	                        
	                       
	                    </div>
	                </div>
	                
	                <!-- /.row -->
	                <!-- Lista -->
	                
	<table class="table table-striped" id="example">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				
			</tr>
			</thead>
			<tbody>
				<? foreach ($lista as $contador => $objeto){ ?>
				<tr>
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->descricao ?></td>
				</tr>	
					<?} ?>
					
					
					
						
		</tbody>
	</table>
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script> 
	
<?
	include_once 'includes/footer.php';
?>
