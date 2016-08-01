<?php 
	include_once 'includes/header.php';
	
	
	if(count($_GET)>0){
		$dao = new ProjetoDao();
		$dao->excluir($_GET["id"]);
		echo "Projeto deletado com sucesso";
	}
	$dao = new ProjetoDao();
	$lista = $dao->listar("");
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
<table class="table table-striped">
  			
  			<tr>
				<th>Nome do Projeto</th>
				<th>Descrição</th>
				<th>Data de inicio</th>
				<th>Prazo final</th>
				<th>Alterar</th>
				<th>Excluir</th>
				<th>Inserir tarefa</th>
				<th>Listar tarefas</th>
			</tr>
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
				&op=alterar"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a></td>
				
									<td>
<a href="lista-projeto.php
	?id=<?= $objeto->projeto_id ?>
	&op=excluir"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>
					
					<td>
<a href="insere-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir"><i class="fa fa-plus-square" aria-hidden="true"></i></a></td>

					<td>
<a href="lista-projeto-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir"><i class="fa fa-list"></i></a></td>
					
				</tr>
			<? } ?>
<!-- fim envia GET -->
</table>
<!-- Fim lista -->
	</div>
</div>
<?php 
include_once 'includes/footer.php';
?>