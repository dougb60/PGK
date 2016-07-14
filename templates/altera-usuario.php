
<div class="modal fade" id="altera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" name="form" action="cadastra-usuario.php" method="POST">
	  <div class="form-group">
	    <label for="nome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="<?= $obj["nome"] ?>"] required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $obj["email"] ?>" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="fone" class="col-sm-2 control-label">Telefone</label>
	    <div class="col-sm-10">
	      <input type="text" name="fone" class="form-control" id="fone" placeholder="Telefone" value="<?= $obj["fone"] ?>" required>
	    </div>
	  </div>
	  <div>
	      <input type="hidden" name="id" value="<?= $obj["id"]?>">
	    </div>
	  </div>
      <div class="modal-footer">
        <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">Registrar</button>
	      <button type="reset" class="btn btn-danger">limpar</button>
	    </div>
	  </div>
	</form>
      </div>
    </div>
  </div>
  
 