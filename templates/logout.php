<?
	$SID = session_id();
	if(empty($SID)){
		session_start();
	}

	$_SESSION["usuario_logado"] = "";
	header("Location: login.php");
?>