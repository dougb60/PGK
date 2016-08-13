<?
class UsuarioDao {

	public function inserir(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO usuarios (login, senha, nome, email, telefone) 
				VALUES (?, ?, ?, ?, ?);
			");
			$stm->bindValue(1, $obj->login);
			$stm->bindValue(2, $obj->senha);
			$stm->bindValue(3, $obj->nome);
			$stm->bindValue(4, $obj->email);
			$stm->bindValue(5, $obj->fone);
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
					nome = ?,
					email = ?,
					telefone = ?
				WHERE usuario_id = ?;
			");
			$stm->bindValue(1, $obj->nome);
			$stm->bindValue(2, $obj->email);
			$stm->bindValue(3, $obj->fone);
			$stm->bindValue(4, $obj->id);
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
				DELETE FROM usuarios WHERE usuario_id = ?;
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
	public function listar($login){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT * FROM usuarios
				WHERE login LIKE ?;
			");
			$stm->bindValue(1, "%$login%");
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
	public function login(Entidade $obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT usuario_id FROM usuarios
				WHERE login = ? and senha = ?;
			");
			$stm->bindValue(1, $obj->login);
			$stm->bindValue(2, $obj->senha);
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
	
public function carregar($id){
		$objetos = array();
		try {
			$con = ConexaoDB::conectar();
			$stm = $con->prepare("
			SELECT * FROM usuarios 
			WHERE usuario_id = ?;
			");
			$stm->bindValue(1, $id);
			$resp = $stm->execute();
			if($resp && $stm->rowCount()){
				$objetos = $stm->fetchAll(
						PDO::FETCH_OBJ
				);
			}
			return $objetos[0];
		} catch(Exception $e){
			echo "Erro no carregar: " . $e->getMessage();
		}
	}
	
	public function validaLogin($login, $senha){
		$objeto = "";
		try {
			$con = ConexaoDB::conectar();
			$stm = $con->prepare("
			SELECT * FROM usuarios 
			WHERE login = ? AND senha = ?;
			");
			$stm->bindValue(1, $login);
			$stm->bindValue(2, $senha);
			$resp = $stm->execute();
			if($resp && $stm->rowCount()){
				$objeto = $stm->fetch(PDO::FETCH_OBJ);
			}
			
		} catch(Exception $e){
			echo "Erro no carregar: " . $e->getMessage();
		}
		return $objeto;
	}
	
	public function validaAcesso($login, $pagina){
		$objeto = "";
		try {
			$con = ConexaoDB::conectar();
			$stm = $con->prepare("
				SELECT 
					u.usuario_id
				FROM 
					dbtcc.usuarios AS u
						left JOIN usuarios_paginas AS up
							ON u.usuario_id = up.usuario_id
						left JOIN paginas AS p
							ON p.paginas_id = up.paginas_id
				WHERE 
					u.login = ? 
					AND p.nome = ?;
			");
			$stm->bindValue(1, $login);
			$stm->bindValue(2, $pagina);
			$resp = $stm->execute();
			if($resp && $stm->rowCount()){
				$objeto = $stm->fetch(PDO::FETCH_OBJ);
			}
			
		} catch(Exception $e){
			echo "Erro no carregar: " . $e->getMessage();
		}
		return $objeto;
	}
	public function validar($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT nome FROM usuarios
				WHERE login = ?;
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