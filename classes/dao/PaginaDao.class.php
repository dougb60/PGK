<?php

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

	public function alterar(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				UPDATE paginas SET
					nome = ?
				WHERE pagina_id = ?;
			");
			$stm->bindValue(1, $obj->nome);
			$stm->bindValue(2, $obj->pagina_id);
			
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
				DELETE FROM usuarios WHERE pagina_id = ?;
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
	public function listar($nome){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT * FROM paginas
				WHERE nome LIKE ?;
			");
			$stm->bindValue(1, "%$nome%");
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