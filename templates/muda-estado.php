<?
include_once 'includes/header.php';


/* Tranforma o estado para o update, passa de status para status */
if(count($_GET) > 0){
	
	$obj = ($_GET);
	
	if ($obj["estid"] == 1){
		$obj["estid"] = 2;
	}elseif ($obj["estid"] == 2){
		$obj["estid"] = 3;
	}elseif ($obj["estid"] == 3){
		$obj["estid"] = 2;
	}else {
		echo "Erro";
	}

		
	$dao = new EstadoDao();
	$altera = $dao->alterar($obj);
	header("Location:lista-projeto-tarefa.php?id=".$obj["id"]."&nome=".$obj["nome"]);
	
}