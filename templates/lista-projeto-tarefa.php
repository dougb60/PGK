
<?
include_once 'includes/header.php';
/*if(count($_GET)>0){
	$dao = new InsereTarefaDao();
	$dao->excluir($_GET["id"]);
	echo "Projeto deletado com sucesso";
}*/
$get = ($_GET);

$dao = new InsereTarefaDao();
$lista = $dao->listar($get);

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
		
				<table id="example" class="table table-striped">
				<thead>
				<tr>
					<th>Nome da tarefa</th>
					<th>Descrição</th>
					<th>Usuario</th>
					<th>Inicio</th>
					<th>Prazo</th>
					<th>Situação</th>
					<th>Atribuir</th>
					
				</tr>
				</thead>
			<tbody>
				<? foreach ($lista as $contador => $objeto){
					$df = explode("-", $objeto->dini);
					$objeto->data_inicio_formatada = $df[2] ."/". $df[1] ."/". $df[0];
					$df = explode("-", $objeto->dfim);
					$objeto->data_fim_formatada = $df[2] ."/". $df[1] ."/". $df[0];
				?>
					<tr> 
						<td><?= $objeto->tarefa ?></td>
						<td><?= $objeto->tdesc ?></td>
						<td><?= $objeto->usuario?></td>
						<td><?= $objeto->data_inicio_formatada  ?></td>
						<td><?= $objeto->data_fim_formatada ?></td>
						<td><?= $objeto->estado?></td>
						<td>
						<form action="http://google.com">
    					<input type="submit" class="btn btn-info" value="Atribuir" />
						</form>
						</td>	
					

					
					</tr>
				<? } ?>			
			</tbody>
		</table>
			<script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script> 

<? include_once 'includes/footer.php' ?>
