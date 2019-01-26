<?php

/**
 *  
 */
class UserModel
{
	private $nome;
	private $email;

	function __construct()
	{
		# code...
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}


	public function buscaPorId($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM usuarios WHERE id = :ID",array(":ID" => $id));

		if(count($results) > 0) {
			$row = $results[0];
			$this->setNome($row["nome"]);
			$this->setEmail($row["email"]);
		}
	}

public function UsersList($limit = 20,$offset = 0, $campoOrder = 'nome'){
		$sql = new Sql();
		$query = "SELECT * FROM usuarios ORDER BY $campoOrder LIMIT $limit OFFSET $offset";
		;
		//var_dump($query);die;
		$arrayUsers = $sql->select($query);
		return $arrayUsers;
	}

/*
public function listaUsuarios($limit = 20,$offset = 0, $order = "nome DESC"){
		$sql = new Sql();
		$query = "SELECT * FROM usuarios ORDER BY $order LIMIT $limit OFFSET $offset ";
		$results = $sql->select($query);
		//var_dump($query);
		echo json_encode($results);
	}	*/

public function __toString(){
	if($this->nome){
		return "nome do usuario {$this->getNome()}";
	}else
		return "Consulta nao retorno nenhum usuario com este ID";
	
}

public function alteraNome($nome,$id){
	$sql = new Sql;
	$query = 'UPDATE usuarios SET nome =:NOME WHERE id = :ID';
	$sql->query($query,array(':NOME'=>$nome, ':ID'=>$id));

}
public function alteraEmail($email,$id){
	$sql = new Sql;
	$query = 'UPDATE usuarios SET email =:EMAIL WHERE id = :ID';
	$sql->query($query,array(':EMAIL'=>$email, ':ID'=>$id));

}

public function apagaUsuario($id){
	$sql = new Sql;
	$query = 'DELETE FROM usuarios WHERE :ID = $id';
	$sql->query($query,array(':ID'=>$id));
}

}