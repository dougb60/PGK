<?
class ProjetoDao {

	public function inserir(Entidade $obj){
		try {
			
			
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO projetos (nome, descricao, data_inicio, data_fim, estados_id, usuarios_id) 
				VALUES (?, ?, ?, ?, 1, 2);
			");
			$stm->bindValue(1, $obj->nome);
			$stm->bindValue(2, $obj->descricao);
			$stm->bindValue(3, $obj->dini);
			$stm->bindValue(4, $obj->dfim);
			
			
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
			
			
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	
	public function alterar(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				UPDATE projetos SET
					nome = ?,
					descricao = ?,
					data_inicio = ?,
					data_fim = ?
				WHERE projeto_id = ?;
			");
			$stm->bindValue(1, $obj->nome);
			$stm->bindValue(2, $obj->descricao);
			$stm->bindValue(3, $obj->dini);
			$stm->bindValue(4, $obj->dfim);
			$stm->bindValue(5, $obj->id);
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
				
				
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	
	public function excluir($id){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				DELETE FROM projetos WHERE projeto_id = ?;
			");
			$stm->bindValue(1, $id);
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
				
				
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	public function validar($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT nome FROM projetos
				WHERE nome = ?;
			");
			$stm->bindValue(1, $obj);
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
	public function listar($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT * FROM projetos
				WHERE nome LIKE ?;
			");
			$stm->bindValue(1, "%$obj%");
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
	
	
}
	
	

?>
