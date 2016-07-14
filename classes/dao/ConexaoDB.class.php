<?
class ConexaoDB {
	
	public static function conectar(){
		try {
			// Variáveis utilizadas para a conexão com o BD		
			$tipo = "mysql";
			$banco = "tccdb2";
			$caminho = "localhost";
			$usuario = "root";
			$senha = "";			
			// instancia a conexão com o banco de dados
			$str = "$tipo:dbname=$banco;host:$caminho;";
			$con = new PDO($str, $usuario, $senha, array());
			$con->setAttribute(
				PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
			);
			return $con;
			
		} catch(Exception $e){
			echo 
				"Erro ao conectar no banco de dados: " .
				$e->getMessage(); 
				exit;
		}
	}
}
?>