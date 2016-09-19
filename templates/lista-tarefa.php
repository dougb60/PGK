<?
	include_once 'includes/header.php';
	
	if(count($_GET)>0){
		$dao = new TarefaDao();
		$teste = $dao->excluir($_GET["id"]);
		
		echo '<div class="alert alert-danger" role="alert">Tarefa deletada com sucesso</div>';
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
	
<?
	include_once 'includes/footer.php';
?>
