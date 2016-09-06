<?php 
	require_once "../classes/entidades/Entidade.class.php";
	require_once "../classes/dao/ConexaoDB.class.php";
	require_once "../classes/dao/UsuarioDao.class.php";
	require_once "../classes/dao/PaginaDao.class.php";
	require_once "../classes/dao/ProjetoDao.class.php";
	require_once "../classes/dao/TarefaDao.class.php";
	
	require_once "../classes/dao/InsereTarefaDao.class.php";
	
	
// Verifica em qual página estou
	$url = $_SERVER["REQUEST_URI"];	
	$url = explode('/', $_SERVER["REQUEST_URI"]);
	$pagina = $url[count($url) - 1];
	
	// Inicia a sessão do PHP
	$SID = session_id();
	if(empty($SID)){
		session_start();
	}
	
	// Verifica se o usuário pode acessar a página
	$usuario_logado = isset($_SESSION["usuario_logado"]) && $_SESSION["usuario_logado"] != ""
		? $_SESSION["usuario_logado"]
		: "";	
	
	if (
		$usuario_logado != "" && $pagina != "login.php"
	){
		$dao = new UsuarioDao();
		$pode_acessar = 
			$dao->validaAcesso($usuario_logado, $pagina);
		if ($pode_acessar == ""){
			//header("Location: login.php");
		} 
	} else if ($pagina != "login.php"){
		header("Location: login.php");
	}
	?>
