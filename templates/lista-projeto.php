<?php 
	include_once 'includes/header.php';
	
	/* valida o usuario da pagina */
	$dao = new UsuarioDao();
	$listar = $dao->listar($usuario_logado);
	foreach ($listar as $key => $objeto){
		
	}
	$id = $objeto->usuario_id;
	if(count($_GET)>0){
		$dao = new ProjetoDao();
		$dao->excluir($_GET["id"]);
		echo "Projeto deletado com sucesso";
	}
	$dao = new ProjetoDao();
	$lista = $dao->listar("",$id);//retorno apenas os projetos ativos do usuario logado
	
?>

<!-- header -->
<div id="page-wrapper">
    <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista Projeto 
                       </h1>
                    </div>
                </div>
<!-- Lista -->
<table id="example" class="table table-striped">
  			<thead>
  			<tr>
				<th>Nome do Projeto</th>
				<th>Descrição</th>
				<th>Data de inicio</th>
				<th>Prazo final</th>
				<th>Operações</th>
			</tr>
			</thead>
			<tbody>
			<? foreach ($lista as $contador => $objeto){
				$df = explode("-", $objeto->data_inicio);
				$objeto->data_inicio_formatada = $df[2] ."/". $df[1] ."/". $df[0];
				$df = explode("-", $objeto->data_fim);
				$objeto->data_fim_formatada = $df[2] ."/". $df[1] ."/". $df[0];
			?>
				
					<td><?= $objeto->nome ?></td>
					<td><?= $objeto->descricao ?></td>
					<td><?= $objeto->data_inicio_formatada ?></td>
					<td><?= $objeto->data_fim_formatada ?></td>
					
					
					<!-- envia GET -->
					<td><a href="altera-projeto.php
				?id=<?= $objeto->projeto_id ?>
				&nome=<?= $objeto->nome ?>
				&desc=<?= $objeto->descricao ?>
				&dini=<?= $objeto->data_inicio ?>
				&dfim=<?= $objeto->data_fim ?>
				&op=alterar"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"> | </i></a>
				
									
<a href="lista-projeto.php
	?id=<?= $objeto->projeto_id ?>
	&op=excluir"><i class="fa fa-trash fa-2x" aria-hidden="true"> | </i></a>
					
					
<a href="insere-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir"><i class="fa fa-plus-square fa-2x" aria-hidden="true"> | </i></a>

					
<a href="lista-projeto-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir"><i class="fa fa-list fa-2x"> </i></a></td>
					
				</tr>
			<? } ?>
<!-- fim envia GET -->
</tbody>
</table>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
	});
	</script> 
<!-- Fim lista -->
	</div>
</div>
<?php 
include_once 'includes/footer.php';
?>