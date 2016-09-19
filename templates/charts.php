<?php ?>
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
<script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#total').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Processando X Finalizados'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'total',
                colorByPoint: true,
                data: [{
                    name: 'Abertos',
                    y: <?= $totalA?>
                }, {
                    name: 'Finalizados',
                    y: <?= $totalF?>,
                    sliced: true,
                    selected: true
                }]
            }]
        });
    });
});
</script>