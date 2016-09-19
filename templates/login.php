<?
require_once "includes/header-login.php";


$erro = "";
$obj = new Entidade();
$dao = new UsuarioDao();

$login = isset($_POST["login"])? $_POST["login"] :"";
$senha = isset($_POST["senha"])? $_POST["senha"] :"";

if ($login != "" && $senha != ""){
	
	$obj = $dao->validaLogin($login, $senha);
	
	if ($obj == ""){
		$_SESSION["usuario_logado"] = "";
		$erro = '<div class="alert alert-danger col-sm-offset-4 col-sm-5" style="text-align:center;">
				Erro ao tentar logar, por favor entre em contato
				com o administrador.</div>';
		
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
    
    
    
    	<link href="../css/bootstrap.css" rel="stylesheet">
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
		<input type="submit" class="button" value="login" onclick="alerta()">
		<a href="#" class="button">Registrar</a>
		</div>
	
	</form>
    <div><?= $erro?></div>
    
    
    
    
  </body>
</html>
