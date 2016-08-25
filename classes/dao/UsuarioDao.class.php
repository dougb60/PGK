<?
class UsuarioDao {

	public function inserir(Entidade $obj){
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO usuarios (login, senha, nome, email, telefone, cel, status, tipo) 
				VALUES (?, ?, ?, ?, ?, ?, 'A', 'user');
			");
			$stm->bindValue(1, $obj->login);
			$stm->bindValue(2, $obj->senha);
			$stm->bindValue(3, $obj->nome);
			$stm->bindValue(4, $obj->email);
			$stm->bindValue(5, $obj->fone);
			$stm->bindValue(6, $obj->cel);
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
					telefone = ?,
					cel = ?
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
				UPDATE usuarios set status =('I') WHERE usuario_id = ?;
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
				WHERE login LIKE ?
				AND status = 'A';
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
	public function validaLig($obj){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT 
					tp.tarefas_id,
					p.projeto_id,
        			e.estados_id,
    	   			u.usuario_id
   						FROM tarefas_projetos AS tp 
							INNER JOIN projetos AS p ON p.projeto_id = tp.projetos_id
    						INNER JOIN estados AS e ON e.estados_id = tp.estados_id
    						INNER JOIN usuarios AS u ON u.usuario_id =  tp.usuarios_id
							INNER JOIN tarefas AS t ON t.tarefas_id = tp.tarefas_id			
								WHERE u.usuario_id = ? AND (p.estados_id = 1 OR p.estados_id = 2)   
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
	public function validaUp(){
		$objetos = array();
		try {
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				SELECT
					p.nome AS 'projeto',
                    e.nome AS 'situacao',
    	   			u.login,
                    u.nome AS 'usuario'
   						FROM projetos AS p
    						INNER JOIN estados AS e ON e.estados_id = p.estados_id
    						INNER JOIN usuarios AS u ON u.usuario_id =  p.usuarios_id
								WHERE  (p.estados_id = 1 OR p.estados_id = 2)
                                AND p.status = 'A' GROUP BY p.nome;
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
	
}
	
	

?>