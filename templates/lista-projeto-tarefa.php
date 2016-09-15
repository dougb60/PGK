<?
include_once 'includes/header.php';


$get = ($_GET);

$dao = new InsereTarefaDao();
$lista = $dao->listar($get);

$dao = new UsuarioDao();
$lista2 = $dao->listar("");
?>
<!-- lista -->
<div id="page-wrapper">
	            <div class="container-fluid">
	
	                <!-- Page Heading -->
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            <?= $get["nome"]?>
	                       </h1>
	                    </div>
	                </div>
	                <!-- /.row -->
	                <!-- Lista -->
				<table id="example" class="table table-striped">
				<thead>
				<tr>
					<th class="col-sm-1">Nome da tarefa</th>
					<th class="col-sm-3">Descrição</th>
					<th class="col-sm-1">Usuario</th>
					<th class="col-sm-2">Inicio</th>
					<th class="col-sm-2">Prazo</th>
					<th class="col-sm-2">Situação</th>
					<th class="col-sm-1">Designar</th>
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
						<td><? if ($objeto->estados_id == 1){?>
							<a class="btn btn-success" href="muda-estado.php
							?projid=<?= $objeto->projeto_id?>
							&tarid=<?= $objeto->tarefas_id?>
							&usuid=<?= $objeto->usuario_id?>
							&estid=<?= $objeto->estados_id?>
							&id=<?= $get["id"]?>
							&nome=<?= $get["nome"]?>
							&op=alterar">Aguardando</a>
							<? }elseif ($objeto->estados_id == 2){?>
							<a class="btn btn-warning" href="muda-estado.php
							?projid=<?= $objeto->projeto_id?>
							&tarid=<?= $objeto->tarefas_id?>
							&usuid=<?= $objeto->usuario_id?>
							&estid=<?= $objeto->estados_id?>
							&id=<?= $get["id"]?>
							&nome=<?= $get["nome"]?>
							&op=alterar">Processando</a>
							<? }elseif ($objeto->estados_id == 3){?>
							<a class="btn btn-primary" href="muda-estado.php
							?projid=<?= $objeto->projeto_id?>
							&tarid=<?= $objeto->tarefas_id?>
							&usuid=<?= $objeto->usuario_id?>
							&estid=<?= $objeto->estados_id?>
							&id=<?= $get["id"]?>
							&nome=<?= $get["nome"]?>
							&op=alterar">Finalizado</a>
							<?}else {echo "ERRO";}?>
						<td><a href="insere-usuario-tp.php
							?projid=<?= $objeto->projeto_id ?>
							&tarid=<?= $objeto->tarefas_id ?>
							&projeto=<?= $objeto->projeto?>
							&tarefa=<?= $objeto->tarefa?>
							&op=alterar"><i class="fa fa-user-plus fa-2x" aria-hidden="true"></i></a>
						</td>
					
					</tr>
				<? } ?>			
			</tbody>
		</table>
		<div class="col-sm-3">
		<div><a href="pstatus.php?id=<?= $_GET["id"]?>" class="btn btn-success">Confirmar</a>
		<a href="lista-projeto.php" class="btn btn-danger">Voltar</a></div></div>
			<script>
	$(document).ready(function() {
    $('#example').DataTable();
    $('#modal').DataTable();
	});
	</script> 


<? include_once 'includes/footer.php' ?>
