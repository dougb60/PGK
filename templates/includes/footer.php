</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
   <!-- <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script> --> 
	
	<!-- Form validator -->
	<script src="../js/jquery-validation/dist/jquery.validate.js"</script>
	<script src="../js/jquery-validation/dist/additional-methods.js</script>
	<script src="../js/meujs/valida.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.js"></script>
	<!-- Custom JS -->
    
    <!-- highcharts -->
    <script src="../js/highcharts/js/highcharts.js" ></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
    
    <!-- mascara -->
	<script src="../js/mask.js" type="text/javascript"></script>
	<!-- mascara -->
	<script src="../js/jquery-mask/dist/jquery.mask.min.js" type="text/javascript"></script>
	<!-- Data table 
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>-->
	<script src="../js/jquery.dataTables.js" type="text/javascript"></script>
	<script src="../js/dataTables.bootstrap.min.js" type="text/javascript"></script>
	
	<!-- Confirm button -->
	<script src="../js/Bootstrap-Confirmation/bootstrap-confirmation.js"></script>
	<script>
  console.log('Bootstrap ' + $.fn.tooltip.Constructor.VERSION);
  console.log('Bootstrap Confirmation ' + $.fn.confirmation.Constructor.VERSION);

  $('[data-toggle=confirmation]').confirmation();
  $('[data-toggle=confirmation-singleton]').confirmation({
    rootSelector: '[data-toggle=confirmation-singleton]'
  });
  $('[data-toggle=confirmation-popout]').confirmation({
    rootSelector: '[data-toggle=confirmation-popout]'
  });

  var currency = '';
  $('#custom-confirmation').confirmation({
    onConfirm: function() {
      alert('You choosed ' + currency);
    },
    buttons: [
      {
        class: 'btn btn-danger',
        icon: 'glyphicon glyphicon-usd',
        onClick: function() {
          currency = 'US Dollar';
        }
      },
      {
        class: 'btn btn-primary',
        icon: 'glyphicon glyphicon-euro',
        onClick: function() {
          currency = 'Euro';
        }
      },
      {
        class: 'btn btn-warning',
        icon: 'glyphicon glyphicon-bitcoin',
        onClick: function() {
          currency = 'Bitcoin';
        }
      },
      {
        class: 'btn btn-default',
        icon: 'glyphicon glyphicon-remove',
        cancel: true
      }
    ]
  });
</script>
<!-- PopOver -->



	
	
</body>

</html>