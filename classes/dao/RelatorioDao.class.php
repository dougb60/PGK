<?
	class RelatorioDao{
		
		public function listaMaster($obj){
			$objetos = array();
			try {
				// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
				SELECT 
				 sub.projeto_id,
				 sub.nome_projeto,
				 sub.descricao,
				 sub.data_inicio,
				 sub.data_fim,
				 sub.`status`,
				 sub.usuario_id,
				 sub.usuario_nome,
				 sub.usuario_login,
				 sub.estados_id,
				 sub.estado_nome,
				    CONCAT(sub.tarefas_total, ' (100%)') AS percentual_total,
					CONCAT(sub.tarefas_aguardando , ' (', ((sub.tarefas_aguardando * 100) / sub.tarefas_total), '%)') AS percentual_aguardando,
				    CONCAT(sub.tarefas_iniciado, ' (', ((sub.tarefas_iniciado * 100) / sub.tarefas_total), '%)') AS percentual_iniciado,
				    CONCAT(sub.tarefas_finalizado, ' (', ((sub.tarefas_finalizado * 100) / sub.tarefas_total), '%)') AS percentual_finalizado
  				FROM (
				 SELECT 
				  p.projeto_id,
				  p.nome AS nome_projeto,
				  p.descricao,
				  p.data_inicio,
				  p.data_fim,
				  p.`status`,
				  u.usuario_id,
				  u.nome AS usuario_nome,
				  u.login AS usuario_login,
				  e.estados_id,
				  e.nome AS estado_nome,
				  COALESCE((SELECT COUNT(projetos_id) AS qtd FROM tarefas_projetos AS a WHERE a.projetos_id = p.projeto_id GROUP BY a.projetos_id), 0) AS tarefas_total,
				  COALESCE((SELECT COUNT(projetos_id) AS qtd FROM tarefas_projetos AS a WHERE a.projetos_id = p.projeto_id AND a.estados_id = 1 GROUP BY a.projetos_id), 0) AS tarefas_aguardando,
				  COALESCE((SELECT COUNT(projetos_id) AS qtd FROM tarefas_projetos AS a WHERE a.projetos_id = p.projeto_id AND a.estados_id = 2 GROUP BY a.projetos_id), 0) AS tarefas_iniciado,
				  COALESCE((SELECT COUNT(projetos_id) AS qtd FROM tarefas_projetos AS a WHERE a.projetos_id = p.projeto_id AND a.estados_id = 3 GROUP BY a.projetos_id), 0) AS tarefas_finalizado    
				 FROM projetos AS p
				  INNER JOIN tarefas_projetos AS tp ON tp.projetos_id = p.projeto_id
				  INNER JOIN usuarios AS u ON u.usuario_id = p.usuarios_id
				  INNER JOIN estados AS e ON e.estados_id = p.estados_id
				  WHERE p.projeto_id = ?
				 GROUP BY p.projeto_id
				) AS sub
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
		public function listaProj($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					select count(projeto_id) AS total_projeto from projetos AS p
						INNER JOIN usuarios AS u ON p.usuarios_id = u.usuario_id
						WHERE u.login = ?
    					AND p.status = 'A';
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
		public function listaProjAbto($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					select count(projeto_id) AS total_abto from projetos AS p
						INNER JOIN usuarios AS u ON p.usuarios_id = u.usuario_id
						WHERE u.login = ?
						AND p.estados_id = 1
    					AND p.status = 'A';
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
		public function listaProjPcdo($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					select count(projeto_id) AS total_pcdo from projetos AS p
						INNER JOIN usuarios AS u ON p.usuarios_id = u.usuario_id
						WHERE u.login = ?
						AND p.estados_id = 2
    					AND p.status = 'A';
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
		public function listaProjFin($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					select count(projeto_id) AS total_fin from projetos AS p
						INNER JOIN usuarios AS u ON p.usuarios_id = u.usuario_id
						WHERE u.login = ?
						AND p.estados_id = 3
    					AND p.status = 'A';
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
		public function listaTarefProj($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					SELECT
						COUNT(tp.tarefas_id) as total_tarefa,
						p.nome as Pnome
						FROM tarefas_projetos AS tp
						INNER JOIN projetos AS p ON tp.projetos_id = p.projeto_id
						WHERE p.usuarios_id = ?
						AND p.status='A'
						GROUP BY p.nome
			");
				$stm->bindValue(1, $obj->usuario_id);
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
		public function listaProjAtr($obj){
			$objetos = array();
			try {// Abre a conexão com o banco de dados
				$con = ConexaoDB::conectar();
				// Monta o comando para a inserção
				$stm = $con->prepare("
					SELECT *, COUNT(projeto_id) AS total_atr
					FROM projetos WHERE usuarios_id = ?
					AND status = 'A'
					AND (estados_id = 1 or 2)
					AND data_fim < CURDATE()
		
			");
				$stm->bindValue(1, $obj->usuario_id);
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