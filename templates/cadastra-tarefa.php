<?
	include_once 'includes/header.php';
?>
	<div id="page-wrapper">
		<div class="container-fluid">

                <!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Cadastrar Usuários 
					</h1>
                        
                       
				</div>
			</div>
                
                <!-- /.row -->
			<form class="form-horizontal" name="form" action="" method="POST">
	  			<div class="form-group">
	    			<label for="nome" class="col-sm-2 control-label">Nome</label>
	    		<div class="col-sm-6">
	      			<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
	    		</div>
	  			</div>
	  			<div class="form-group">
	    			<label for="desc" class="col-sm-2 control-label">Descrição</label>
	    		<div class="col-sm-6">
	      			<textarea name="descricao" class="form-control" id="desc" placeholder="Descrição" required></textarea>
	    		</div>
	    		</div>
	  		<div class="form-group">
	    		<div class="col-sm-offset-3 col-sm-6">
	      			<button type="submit" class="btn btn-primary">Registrar</button>
	      			<button type="reset" class="btn btn-danger">Apagar</button>
	    		</div>
	  		</div>
			</form>
	</div>
</div>			
				

<?
	include_once 'includes/footer.php';
?>