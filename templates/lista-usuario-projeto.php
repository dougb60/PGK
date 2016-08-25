<?php
include_once 'includes/header.php';

 $dao = new UsuarioDao();
 //$listar = $dao->listar("");
 $lista = $dao->validaUP();
?>

<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista Usuários 
                       </h1>
                    </div>
                </div>
                <table id="example" class="table table-striped" >
  			<thead>
  			<tr>
				<th>Projeto</th>
				<th>Situação</th>
				<th>Login</th>
				<th>Nome</th>
			</tr>
			</thead>
			<tbody>
	<? foreach ($lista as $contador => $objeto){ ?>
				<tr>
					<td><?= $objeto->projeto ?></td>
					<td><?= $objeto->situacao ?></td>
					<td><?= $objeto->login ?></td>
					<td><?= $objeto->usuario ?></td>
					<!-- envia GET para alterar usuario -->
					</tr>
					<?} ?>
				</tbody>
    </table>
      <script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script> 
<?php 
include_once 'includes/footer.php';
?>