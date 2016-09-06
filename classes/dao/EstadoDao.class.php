<?

class EstadoDao{

	public function listar(){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT nome, estados_id FROM estados
			");
			
			// Executa o comando
			$resp = $stm->execute();
				
			if($resp && $stm->rowCount()){
				$objetos = $stm->fetchAll(
						PDO::FETCH_OBJ
						);
			}
			return $objetos;
	
	
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	public function alterar($obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				UPDATE tarefas_projetos SET  estados_id = ? 
				WHERE projetos_id = ? 
				AND usuarios_id = ? 
				AND tarefas_id = ?
			");
			$stm->bindValue(1, $obj["estid"]);
			$stm->bindValue(2, $obj["projid"]);
			$stm->bindValue(3, $obj["usuid"]);
			$stm->bindValue(4, $obj["tarid"]);
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
	
	
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
}
?>