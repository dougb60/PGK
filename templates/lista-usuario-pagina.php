<?php

include_once 'includes/header.php';
$dao = new UsuarioDao();
$login = isset($_POST["login"]) ? $_POST["login"] : "";
$lista = $dao->listar($login);
?>
<div id="page-wrapper">
		<div class="container-fluid">

                <!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Lista de usuários - Acesso 
					</h1>
                        
                       
				</div>
			</div>



<table  class="table table-striped" id="example">
    <thead>
        <tr>
            <th>Registro</th>
            <th>Login</th>
            <th>Senha</th>
            <th class="col-sm-1">Alterar</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach ($lista as $contador => $objeto) { ?>
            <tr>
                <td><?= $objeto->usuario_id ?></td>
                <td><?= $objeto->login ?></td>
                <td><?= $objeto->senha ?></td>
                <td>
                    
                        <a href="cadastra-usuario-pagina.php?id=<?= $objeto->usuario_id ?>&op=carregar">
                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                        
                </td>
                
            </tr>
        <? } ?>			
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
<? include_once 'includes/footer.php' ?>