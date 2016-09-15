<?
include_once 'includes/header.php';

$dao = new RelatorioDao();

/* Lista todos */
$listaProj = $dao->listaProj($_SESSION["usuario_logado"]);
foreach ($listaProj as $key => $objeto){
	
}
/* Lista abertos */
$listaProj = $dao->listaProjAbto($_SESSION["usuario_logado"]);
foreach ($listaProj as $key => $objetoA){

}
/* Lista processando */
$listaProj = $dao->listaProjPcdo($_SESSION["usuario_logado"]);
foreach ($listaProj as $key => $objetoP){

}
/* Lista finalizado */
$listaProj = $dao->listaProjFin($_SESSION["usuario_logado"]);
foreach ($listaProj as $key => $objetoF){

}
/* Tarefas X Projeto */
/* seleciona ID usuario */
$udao = new UsuarioDao();
$usuid = $udao->listar($_SESSION["usuario_logado"]);

/* Lista de atrasados */
foreach ($usuid as $key => $usuid){}
$atdo = $dao->listaProjAtr($usuid);
/* Converte formato de count de atrasados */
foreach ($atdo as $key => $atdo){}
$atrasadoE = explode("','", $atdo->total_atr);
$atrasado = implode("','", $atrasadoE);
/* calcula dentro do prazo */
$dPrazo = intval($objeto->total_projeto - $atrasado);

?>
<div id="page-wrapper">
    <div class="container-fluid ">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            <?= $_SESSION["usuario_logado"]?>
                       </h1>	
                    </div>
                </div>
                  <div class = "col-sm-3 text-center box">
                	<i class="fa fa-archive fa-2x" aria-hidden="true"></i>
                	<div class="linha"></div>
                	<h3>Total de Projetos</h3>
                	<h4><?= $objeto->total_projeto?></h4>
                </div>
                <div class = "col-sm-3 text-center box2">
                	<i class="fa fa-hourglass-start fa-2x" aria-hidden="true"></i>
                	<div class="linha"></div>
                	<h3>Aguardando</h3>
                	<h4><?= $objetoA->total_abto?></h4>
                </div>
                <div class = "col-sm-3 text-center box3">
                	<i class="fa fa-hourglass-half fa-2x" aria-hidden="true"></i>
                	<div class="linha"></div>
                	<h3>Processando</h3>
                	<h4><?= $objetoP->total_pcdo?></h4>
                </div>
                <div class = "col-sm-3 text-center box4">
                	<i class="fa fa-hourglass-end fa-2x" aria-hidden="true"></i>
                	<div class="linha"></div>
                	<h3>Finalizados</h3>
                	<h4><?= $objetoF->total_fin?></h4>
                </div>
                <!-- Chart atrasado -->
                
                <div class="col-sm-4 ">
                <div id="atrasados" class="chart"></div>
                </div>
                <!-- Charts -->
                 <script>
   		$(function () {
	    $('#atrasados').highcharts({
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'Projetos atrasados X no prazo'
	        },
	        xAxis: {
	            categories: [
	                'Projetos'
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Nº Projetos'
	            }
	        },
	        tooltip: {
	            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: [{
	            name: 'Dentro do prazo',
	            data: [<?= $dPrazo?>]

	        }, {
	            name: 'Atrasados',
	            data: [<?= $atrasado?>]
	        }]
	    });
	});
   </script>
<? include_once 'includes/footer.php'; ?>

