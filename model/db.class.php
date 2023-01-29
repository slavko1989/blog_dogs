<?php
include_once(dirname(__FILE__)."../../model/define_db.php");
class Db{

	private $servername;
	private $username;
	private $pass;
	private $dbname;
	private $charset;
	 
public function __construct(){

		$this->servername = DB_SERVERNAME;
		$this->username = DB_USER;
		$this->pass = DB_PASS;
		$this->dbname = DB_DBNAME;
		$this->charset = DB_CHARSET;

}
	public function connect(){
		$options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
		$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=". $this->charset;
try{
	
		$pdo = new PDO($dsn,$this->username ,$this->pass,$options);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $pdo;
}catch(PDOException $e){
	echo "Connection failed: ".$e->getMessage();
}
		
	}
}

?>