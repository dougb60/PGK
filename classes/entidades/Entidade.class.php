<?php
/**
 * Classe responsavel por gerenciar as entidades do sistema (get e set dinâmicos)
 * Os magic methods foram implementados a partir do PHP 5 - magic methods
 * @package classes/entidades
 */
class Entidade {
    
    /**
     * Dados ou informações vinculadas às entidades do sistema
     */
    protected $data; 
    
    /**
     * Construtor da classe
     */
    public function __construct(){
        // Zera o array
        $this->data = array();
    }
    
    /**
     * Método responsável por atribuir um valor a um atrbuto da entidade
     * @param $chave: atributo que receberá o valor
     * @param $valor: valor que será atribuído ou vinculado ao atributo
     */ 
    public function __set($chave, $valor) {
         $this->data[$chave] = $valor;  
    }

    /**
     * Método responsável por apresentar/retornar o valor de um atrbuto da entidade
     * @param $chave: nome do atributo que deve ser  apresentado/retornado
     * @return $valor: valor do atributo que será apresentado/retornado
     */ 
    public function __get($chave)  {
		return (array_key_exists($chave, $this->data)) ? $this->data["$chave"] : null;
	}

	/**
     * Método invocado quando um método da entidade que não existe é chamado no PHP
     * @param $nomeDoMetodo: nome do método invocado
     * @param $argumentos: argumentos passados para o método
     */
    public function __call($nomeDoMetodo, $argumentos) {
        echo "Erro ao tentar invocar o método '$nomeDoMetodo'. O método invocado não existe.";
        exit;
    }

	/**
     * Método responsável por gerar um objeto a partir dos dados de um array (post)
     * @param $data: array com os dados
     * @return $object: objeto
     */ 
	public static function getObject($data) {
		// Verifica se existem dados no post
		if(!sizeof($data)) {
			return null;
		} else {
			// Monta o objeto com os dados
			$object = new Entidade();
			foreach ($data as $campo => $valor) {
				$object->$campo = addslashes(trim($valor));
			}
			return $object;
		}
	}
	
	/**
	 * Método responsável por gerar um objeto a partir dos dados de um array
     * @param $data: array com os dados
     * @return $object: objeto
	 */
	public static function setObject($data) {
		// Verifica se existem dados no post
		if(!sizeof($data)) {
			return null;
		} else {
			// Monta o objeto com os dados
			$object = new Entidade();
			foreach ($data as $campo) {
				$object->$campo = "";
			}
			$object->op = "inserir";
			return $object;
		}
	}
}