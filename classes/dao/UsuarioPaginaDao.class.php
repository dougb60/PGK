<?php

class UsuarioPaginaDao {

    public function inserir(Entidade $obj) {
        try {
           
            // Abre a conexão com o banco de dados
            $con = ConexaoDB::conectar();
            // Monta o comando para a inserção
            $stm = $con->prepare("
               INSERT INTO usuarios_paginas (usuario_id, paginas_id)
                VALUES (?, ?);
            ");
            $stm->bindValue(1, $obj->usuario_id);
            $stm->bindValue(2, $obj->paginas_id);
            // Executa o comando
            if (!$stm->execute()) {
                throw new Exception("Erro no comando");
            }
            
        } catch (Exception $e) {
            echo "Erro no inserir: " . $e->getMessage();
            exit;
        }
    }
    
    public function alterar(Entidade $obj) {
        try {
           
            // Abre a conexão com o banco de dados
            $con = ConexaoDB::conectar();
            // Monta o comando para a inserção
            $stm = $con->prepare("
                UPDATE usuarios_paginas SET 
                    paginas_id = ?
                WHERE usuario_id = ? AND paginas_id = ?;
            ");
            $stm->bindValue(1, $obj->paginas_id);
            $stm->bindValue(2, $obj->usuario_id);
            $stm->bindValue(3, $obj->paginas_id_antiga);
            // Executa o comando
            if (!$stm->execute()) {
                throw new Exception("Erro no comando");
            }
            
        } catch (Exception $e) {
            echo "Erro no inserir: " . $e->getMessage();
            exit;
        }
    }

    public function excluir(Entidade $obj) {
        try {
            // Abre a conexão com o banco de dados
            $con = ConexaoDB::conectar();
            // Monta o comando para a inserção
            $stm = $con->prepare("
                DELETE FROM usuarios_paginas 
                WHERE usuario_id = ? AND paginas_id = ?;
            ");
            $stm->bindValue(1, $obj->usuario_id);
            $stm->bindValue(2, $obj->paginas_id);
            // Executa o comando
            if (!$stm->execute()) {
                throw new Exception("Erro no comando");
            }
        } catch (Exception $e) {
            echo "Erro no inserir: " . $e->getMessage();
        }
    }
}
?>