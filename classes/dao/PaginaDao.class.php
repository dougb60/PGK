<?
class PaginaDao {
	
	public function inserir(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO paginas (nome) 
				VALUES (?);
			");
			$stm->bindValue(1, $obj->nome);
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
				DELETE FROM paginas WHERE pagina_id = ?;
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
	
	public function alterar(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				UPDATE usuarios SET 
					login = ?, 
					senha = ? 
				WHERE usuario_id = ?;
			");
			$stm->bindValue(1, $obj->login);
			$stm->bindValue(2, $obj->senha);
			$stm->bindValue(3, $obj->usuario_id);
			// Executa o comando
			if(!$stm->execute()){
				throw new Exception("Erro no comando");
			}
			
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
	}
	
	public function listar($usuario_id = "", $nome = ""){
		$objetos = array();
		try {			
			$con = ConexaoDB::conectar();
			if ($usuario_id != ""){
				$stm = $con->prepare("
					SELECT 
						p.*
					FROM 
						db_tcc.usuarios AS u
							left JOIN usuarios_paginas AS up
								ON u.usuario_id = up.usuario_id
							left JOIN paginas AS p
								ON p.pagina_id = up.pagina_id
					WHERE 
						u.usuario_id = ?;
				");
				$stm->bindValue(1, $usuario_id);			
			} else {				
				$stm = $con->prepare("
					SELECT * FROM paginas 
					WHERE nome LIKE ?;
				");
				$stm->bindValue(1, "%$nome%");
			}
			$resp = $stm->execute();
			if($resp && $stm->rowCount()){
				$objetos = $stm->fetchAll(
					PDO::FETCH_OBJ
				);
			}
			// return $objetos;			
		} catch(Exception $e){
			echo "Erro no inserir: " . $e->getMessage();
		}
		return $objetos;
	}	
}
?>