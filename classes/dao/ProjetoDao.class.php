<?
class ProjetoDao {

	public function inserir(Entidade $obj){
		try {
			
			
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO projetos (nome, descricao, data_inicio, data_fim, estados_id, usuarios_id, status) 
				VALUES (?, ?, ?, ?, 1, ?,'A');
			");
			$stm->bindValue(1, $obj->nome);
			$stm->bindValue(2, $obj->descricao);
			$stm->bindValue(3, $obj->dini);
			$stm->bindValue(4, $obj->dfim);
			$stm->bindValue(5, $obj->usuid);
			
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
				UPDATE projetos set status = ('I') WHERE projeto_id = ?;
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
				WHERE nome LIKE ?
				AND status = 'A'
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
	public function listaD($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT p.data_inicio AS pdini, 
					p.data_fim AS pdfim, 
					p.nome AS projeto
					FROM projetos AS p
					WHERE p.projeto_id = ?
					GROUP BY projeto
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
	public function alterarE($obj, $obj2){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				UPDATE projetos SET
					estados_id = ?
				WHERE projeto_id = ?;
			");
			$stm->bindValue(1, $obj);
			$stm->bindValue(2, $obj2);
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
	
	
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	public function listarId($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT * FROM projetos
				WHERE projeto_id = ?
				AND status = 'A'
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
	public function listarStatus($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT
				p.nome AS projeto,
				e.nome AS estado
				FROM estados AS e, projetos AS p
				WHERE e.estados_id = p.estados_id
				AND p.projeto_id = ?;
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
	
}
	
	

?>
