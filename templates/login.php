<?
require_once "../classes/entidades/Entidade.class.php";
require_once "../classes/dao/ConexaoDB.class.php";
require_once "../classes/dao/UsuarioDao.class.php";

$dao = new UsuarioDao();
$obj = new Entidade();

$login = isset($_POST["login"])? $_POST["login"] :"";
$senha = isset($_POST["senha"])? $_POST["senha"] :"";

if ($login != "" && $senha != ""){
	$obj = $dao->validaLogin($login, $senha);
	if ($obj == ""){
		$_SESSION["usuario_logado"] = "";
		header("Location: login.php");
	} else {
			
		$_SESSION["usuario_logado"] = $login;
		header("Location: index.php");
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
