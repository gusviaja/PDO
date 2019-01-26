<?php
/**
 * 
 */
class Sql extends PDO
{
	private $conn;
	//***ATRIBUTOS PARA CONEXAO COM O BANCO***	
	private $dbsa;
	private $host;
	private $user;
	private $pass;

	public function __construct()
	{
		$this->dbsa = DBSA;
		$this->host = HOST;
		$this->user = USER;
		$this->pass = PASS;

		$this->conn = new PDO("mysql:dbname=$this->dbsa;host=$this->host","$this->user","$this->pass");
	}

	public function query($rawQuery, $params = array()){
		
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
		
	}

	public function select($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	//METODOS PRIVADOS================//

	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value) {
			$this->setParam($statement,$key,$value);
		}
	}

	private function setParam($statement, $key, $value){
		$statement->bindParam($key,$value);
	}
}