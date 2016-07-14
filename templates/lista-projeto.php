<?php 
	include_once 'includes/header.php';
	
	
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
                            Cadastrar Projeto 
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
				<th>Inserir</th>
				<th>Excluir</th>
				<th>Tarefas</th>
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
					
					
					<td>
<!-- envia GET -->
<a href="altera-projeto.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&desc=<?= $objeto->descricao ?>
	&dini=<?= $objeto->data_inicio ?>
	&dfim=<?= $objeto->data_fim ?>
	&op=alterar">A</a>
					</td>
					<td>
<a href="insere-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir">I</a>
					</td>
					<td>
<a href="lista-projeto.php
	?id=<?= $objeto->projeto_id ?>
	&op=excluir">X</a>
					</td>
					<td>
<a href="lista-projeto-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir">V</a>
					</td>
					
				</tr>
			<? } ?>
<!-- fim envia GET -->
</table>
<!-- Fim lista -->
	</div>
</div>