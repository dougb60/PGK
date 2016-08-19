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

<form class="form-inline" name="form-consulta" action="" method="post">
    <div class="form-group">
		<input type="text" name="login" class="form-control" value="<?= $login ?>" placeholder="Digite o login" >
	</div>
	    <button type="submit" class="btn btn-default">Pesquisar</button>
</form>	

<table  class="table table-striped">
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

<? include_once 'includes/footer.php' ?>