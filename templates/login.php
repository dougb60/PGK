<?
require_once "../classes/entidades/Entidade.class.php";
require_once "../classes/dao/ConexaoDB.class.php";
require_once "../classes/dao/UsuarioDao.class.php";

    if (count($_POST)>0){
    $obj = Entidade::getObject($_POST);
    $dao = new UsuarioDao();
    $lista = $dao->login($obj);
    $redirect = "localhost/tcc/templates/index.php";
    $id = "";
    
    foreach ($lista as $contador=>$objeto){
    $id = $objeto->usuario_id;
    }
    if ($id > 0){
        header("Location: Http://$redirect");
    }
    else {
        header("Location: logout.php");
        
    }
    
}   
    

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Gerenciamento Kanban</title>
    
    
    
    
        <link rel="stylesheet" href="../css/style.css">

    
    
    
  </head>

  <body>

    <form name="login-form" class="login-form" action="" method="post">
	
		<div class="header">
		<h1>PGK - Gerenciador</h1>
		<span>Por favor, faça o login</span>
		</div>
	
		<div class="content">
		<input name="login" type="text" class="input username" placeholder="Login" />
		<div class="user-icon"></div>
		<input name="senha" type="password" class="input password" placeholder="Senha" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<input type="submit" class="button" value="login">
		<a href="#" class="button">Registrar</a>
		</div>
	
	</form>
    
    
    
    
    
  </body>
</html>
