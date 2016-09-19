<?php
include_once 'includes/header.php';

$get = $_GET;

$dao = new UsuarioDao();
$lista = $dao->validaUp($get);

if(count($_POST) > 0){
	$obj = Entidade::getObject($_POST);
	$exclui = $dao->excluirTP($obj);
	header("Location: lista-usuario-projeto.php?id=".$obj->id);
	
}

?>

<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista tarefas usuários
                       </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Form -->
    <table id="example" class="table table-striped" >
  			<thead>
  			<tr>
				<th class="col-sm-2">Projeto</th>
				<th class="col-sm-2">Tarefa</th>
				<th class="col-sm-4">Descrição</th>
				<th class="col-sm-1">Situação</th>
				<th class="col-sm-1">Login</th>
				<th class="col-sm-1">Nome</th>
				<th class="col-sm-1">Desvincular Usuario</th>
			</tr>
			</thead>
			<tbody>
	<? foreach ($lista as $contador => $objeto){ ?>
			<tr>
					<td><?= $objeto->projeto ?></td>
					<td><?= $objeto->tarefa ?></td>
					<td><?= $objeto->tdesc ?></td>
					<td><?= $objeto->estado?></td>
					<td><?= $objeto->login?></td>
					<td><?= $objeto->usuario?></td>
					<td><form action="lista-usuario-projeto.php" method ="POST">
						<input type = "hidden" name="id" value="<?= $objeto->usuario_id?>">
						<input type = "hidden" name="tid" value="<?= $objeto->tid?>">
						<input type="hidden" name="pid" value="<?= $objeto->pid?>">
						<button type="submit" class="btn btn-danger"><i class="fa fa-user-times fa-lg" aria-hidden="true"></i></button>
					</form></td>
	<?php }?>
			</tr>
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
<?php 
include_once 'includes/footer.php';
?>