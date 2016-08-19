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
				<th>Alterar</th>
				<th>Excluir</th>
			</tr>
			</thead>
			<tbody>
				<? foreach ($lista as $contador => $objeto){ ?>
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->descricao ?></td>
					<!-- envia GET para alterar usuario -->
					<td><a href="altera-tarefa.php
					?id=<?= $objeto->tarefas_id?>
					&nome=<?= $objeto->nome ?>
					&descricao=<?= $objeto->descricao ?>
					
					&op=alterar" >
					<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
					<!-- Envia GET para excluir usuario -->
					<td><a href="lista-tarefa.php
					?id=<?= $objeto->tarefas_id ?>
					&op=excluir"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
					<script>
						function exclui(){
						alert('Tarefa Excluida com sucesso');}
						</script>
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
