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
/* Calcula abertos X fechados */
$andamento = $objetoA->total_abto + $objetoP->total_pcdo;
$total = $andamento + $objetoF->total_fin;
/* Calcular % de abertos e fechados */
$totalA = $andamento;
$totalA = ($totalA * 100) / $total;

$totalF = $objetoF->total_fin;
$totalF = ($totalF * 100) / $total;

/* gera dados table tp atrasados */
$listaAtr = $dao->listaTpAtr();
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
                
                <div class="col-sm-4 col-sm-offset-2">
                <div id="atrasados" class="chart"></div>
                </div>
				<!-- Abertos X fechados -->
                <!-- Charts -->
                <div class="col-sm-4 ">
                <div id="total" class="chart"></div>
                </div>
				<!-- Table tp atrasado -->
				<div class="row"></div>
				<div>
				<table class="table table-striped" id="tableAtr">
					<thead>
						<tr>
							<th class="col-sm-2">Projeto</th>
							<th class="col-sm-3">Tarefa</th>
							<th class="col-sm-2">Usuário</th>
							<th class="col-sm-3">Estado</th>
							<th class="col-sm-1">Prazo</th>
							<th class="col-sm-1">Tempo atrasado</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach ($listaAtr as $key => $listaAtr){
						?>
						<tr class="alert alert-danger">
							<td><?= $listaAtr->pnome?></td>
							<td><?= $listaAtr->tnome?></td>
							<td><?= $listaAtr->unome?></td>
							<td><?= $listaAtr->enome?></td>
							<td>
								<? $listaAtr->data_fim = date("d/m/Y", strtotime ($listaAtr->data_fim));
									echo $listaAtr->data_fim;
								?>
							</td>
							<td style="text-align: center;"><?= $listaAtr->tempo_atraso . " Dias"?></td>
						</tr>
						<?}?>
					</tbody>				
				</table>
				</div>
				<script>
				$(document).ready(function() {
			    $('#tableAtr').DataTable({
			    	"autoWidth": false,
			    	"info": false,
			    	"bLengthChange": false,
			    	"language": {
	   	            	"zeroRecords": "Nenhum registro encontrado",
						"search":"Busca: ",
						"paginate": {
							        "first":      "Primeiro",
							        "last":       "Ultimo",
							        "next":       "Proximo",
							        "previous":   "Anterior"
							    },
							"info": "Mostrando _START_ à _END_ de _TOTAL_ entradas",
							"infoEmpty": "Mostrando 0 à 0 de 0 entradas",
							"lengthMenu": "Mostrar _MENU_ entradas",
	   		        }
				    });
				});
				</script> 
              <? include_once 'charts.php';?>
<? include_once 'includes/footer.php'; ?>

