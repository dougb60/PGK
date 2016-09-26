<?php 
	include_once 'includes/header.php';
	
	/* valida o usuario da pagina */
	$dao = new UsuarioDao();
	$listar = $dao->listar($usuario_logado);
	foreach ($listar as $key => $objeto){
		
	}
	if ($objeto->tipo == "user"){
		$urlE = "403.html";
	}else {
		$urlE = "lista-projeto.php";
	}
	
	
	if(count($_GET)>0){
		$dao = new ProjetoDao();
		$dao->excluir($_GET["id"]);
		echo '<div class="alert alert-danger" role="alert">Projeto deletado com sucesso</div>';
	}
	$dao = new ProjetoDao();
	$lista = $dao->listar($objeto->usuario_id);//retorno apenas os projetos ativos do usuario logado
	
	
	
	
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
				
				$timestamp = date("Y-m-d");
				
				$url = "";
				if ($objeto->data_fim < $timestamp ){
					$url = "#";
					$data = "";
				}else
					$url = "insere-tarefa.php";
					$data = 'data-toggle="popover" data-title="O Projeto expirou!" role="button"
							tabindex="0" data-placement="left" data-trigger="focus"'
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
				&op=alterar" title="Alterar Projeto"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"> | </i></a>
				
									
<a  href="<?= $urlE ?>
	?id=<?= $objeto->projeto_id ?>
	&op=excluir"  data-toggle="confirmation" data-title="Tem certeza que deseja excluir?" data-btn-Cancel-Label="Melhor não!"
	data-btn-Ok-Label="Tenho certeza" data-singleton="true" data-btn-Ok-Class="btn-xs btn-success" 
	data-btn-Cancel-Class="btn-xs btn-danger" >
	<i class="fa fa-trash fa-2x" aria-hidden="true"> | </i></a>
					
					
<a href="<?= $url?>
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir" <?= $data?>><i class="fa fa-plus-square fa-2x" aria-hidden="true"> | </i></a>

					
<a href="lista-projeto-tarefa.php
	?id=<?= $objeto->projeto_id ?>
	&nome=<?= $objeto->nome ?>
	&op=inserir" title="Listar tarefa-projeto"><i class="fa fa-list fa-2x"> | </i></a>
<a href="pstatus.php
?id=<?= $objeto->projeto_id?>
&nome=<?= $objeto->nome?>"
title="Status do Projeto"><i class="fa fa-line-chart fa-2x">  </i></a></tr>
			<? } ?>
<!-- fim envia GET -->
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
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
	
<!-- Fim lista -->
	</div>
</div>
<?php 
include_once 'includes/footer.php';
?>