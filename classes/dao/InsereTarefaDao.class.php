
<?
class InsereTarefaDao {

	public function inserir(Entidade $obj){
		try {
			
			
			// Abre a conexão com o banco de dados
			$con = ConexaoDB::conectar();
			// Monta o comando para a inserção
			$stm = $con->prepare("
				INSERT INTO tarefas_projetos (data_inicio, data_fim, tarefas_id, projetos_id, estados_id, usuarios_id) 
				VALUES (?, ?, ?, ?, 1, 2);
			");
			$stm->bindValue(1, $obj->dini);
			$stm->bindValue(2, $obj->dfim);
			$stm->bindValue(3, $obj->tarefa);
			$stm->bindValue(4, $obj->projeto);
			
			
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
				SELECT projetos_id FROM tarefas_projetos
				WHERE tarefas_id = ?
				AND projetos_id = ?
			");
			$stm->bindValue(1, $obj->tarefa);
			$stm->bindValue(2, $obj->projeto);
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
				SELECT 
		tp.tarefas_id,
		tp.data_inicio AS dini,
		tp.data_fim AS dfim,
		p.projeto_id,
    	p.nome AS projeto,
		t.nome AS tarefa,
		t.descricao AS tdesc,			
    	e.estados_id,
    	e.nome AS estado,
   		u.usuario_id,
   		u.nome AS usuario
				FROM tarefas_projetos AS tp 
		INNER JOIN projetos AS p ON p.projeto_id = tp.projetos_id
    	INNER JOIN estados AS e ON e.estados_id = tp.estados_id
    	INNER JOIN usuarios AS u ON u.usuario_id =  tp.usuarios_id
		INNER JOIN tarefas AS t ON t.tarefas_id = tp.tarefas_id			
					WHERE p.projeto_id = ?
			");
			$stm->bindValue(1, $obj["id"]);
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
