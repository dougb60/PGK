<?
	include_once 'includes/header.php';
	
	$get = $_GET["id"];
	error_reporting(0);
	$dao = new RelatorioDao();
	$lista = $dao->listaMaster($get);
	foreach ($lista as $key => $objeto){
		
		
	}
/* Calcula percentual finalizado */
	$percentf = explode("(" , $objeto->percentual_finalizado);
	$percentf2 = explode("%", $percentf[1]);
	$percentF = round($percentf2[0], 2);
/* calcula iniciados */
	$percenta = explode("(" , $objeto->percentual_aguardando);
	$percenta2 = explode("%", $percenta[1]);
	$percentA = round($percenta2[0], 2);
/* calcula processando */
	$percentp = explode("(" , $objeto->percentual_iniciado);
	$percentp2 = explode("%", $percentp[1]);
	$percentP = round($percentp2[0], 2);
	
	if ($percentA == 0) {
		$percentAL = "Nenhuma tarefa Aguardando";
	}else $percentAL = " ";
	
	 if ($percentF == 0) {
		$percentFL = "Nenhuma tarefa Finalizada";
	}else $percentFL = " ";
	
	 if ($percentP == 0) {
		$percentPL = "Nenhuma tarefa Processando";
	}else $percentPL = " ";
	$pdao = new ProjetoDao();
	$plista = $pdao->listarId($get);
	foreach ($plista as $key => $pobjeto){
		
	}
	/* Valida Status do projeto */
	if ($percentF == 100){
		$estado = $pobjeto->estados_id = 3;
	}elseif ($percentP > 0 || ($percentF > 0 && $percentF < 100)){
		$estado = $pobjeto->estados_id = 2;
	}elseif ($percentP == 0 && $percentF == 0){
	$estado = $pobjeto->estados_id = 1;
	}
	
	$alteraEstado = $pdao->alterarE($estado, $pobjeto->projeto_id);
	$listaStatus = $pdao->listarStatus($get);
	
?>
	<!-- header -->
<div id="page-wrapper">
    <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Status do Projeto <?= " ".$_GET["nome"]?>
                       </h1>	
                    </div>
                </div>
                
    <!-- Bar -->
<div class="col-sm-6">
	
	<label for="ago">Aguardando: <?= $percentAL?></label>  
    <div class="progress">
  		<div class="progress-bar progress-bar-success" id="ago" role="progressbar" aria-valuenow="<?= $percentA?>" aria-valuemin="0" aria-valuemax="100" 
  		style="width:<?=  $percentA?>%;">
    		<?= $objeto->percentual_aguardando?>
 		</div>
	</div>
	<label for="pro">Processando: <?= $percentPL?></label>  
    <div class="progress">
  		<div class="progress-bar progress-bar-warning" id="pro" role="progressbar" aria-valuenow="<?= $percentP?>" aria-valuemin="0" aria-valuemax="100" 
  		style="width:<?=  $percentP?>%;">
    		<?= $objeto->percentual_iniciado?>
 		</div>
	</div>
	<label for="fim">Finalizados: <?= $percentFL?></label>  
    <div class="progress">
  		<div class="progress-bar" id="fim" role="progressbar" aria-valuenow="<?= $percentF?>" aria-valuemin="0" aria-valuemax="100" 
  		style="width:<?=  $percentF?>%;">
    		<?= $objeto->percentual_finalizado?>
 		</div>
	</div>
	<label for="vig">Visão geral:</label>
	<div class="progress" id="vig">
		<div class="progress-bar progress-bar-success" style="width:<?=  $percentA?>%;"><?= $percentA."%"?></div>
		<div class="progress-bar progress-bar-warning" style="width:<?=  $percentP?>%;"><?= $percentP."%"?></div>
		<div class="progress-bar" style="width:<?=  $percentF?>%;"><?= $percentF."%"?></div>
	</div>
	<? foreach ($listaStatus as $key => $objeto){
		
	}
	if ($objeto->estado == "Aguardando"){
		echo '<div class="alert alert-success"><h3>Situação: '.$objeto->estado."</h3></div>";
	}elseif ($objeto->estado == "Processando"){
		echo '<div class="alert alert-warning"><h3>Situação: '.$objeto->estado."</h3></div>";
	}elseif ($objeto->estado == "Finalizado"){
		echo '<div class="alert alert-info"><h3>Situação: '.$objeto->estado."</h3></div>";
	}else {
		echo '<div class="alert alert-info"><h3>Situação: Erro no estado do Projeto"</h3></div>"';
	}
	?>
	<a href="lista-projeto.php" class="btn btn-danger">Voltar</a>
</div>		
<? 
	include_once 'includes/footer.php';
?>