<?php
/**
* 
*/

class Database {
	// variable DB connection - start
	private $host;
	private $db;
	private $user;
	private $pass;
	private $charset;
	private $dsn;
	private $opt;
	private $pdo;
	// variable DB connection - end


	// DB Connection - start
	public function __construct(){
		$this->host="127.0.0.1";
		$this->db="db_buku";
		$this->user="root";
		$this->pass="";
		$this->charset="utf8";
		$this->dsn="mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
		$this->opt=[
			PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		];
		$this->pdo=new PDO($this->dsn, $this->user, $this->pass, $this->opt);
	}
	public function query($data){
		$stmt = $this->pdo->query($data);
		return $stmt;
	}
	// DB Connection - end

	// Session - start
	public function set_userdata($data=array()){
		$_SESSION["user"]=$data;
	}
	public function userdata($data=NULL){
		if(!empty($_SESSION["user"])){
			$user= $_SESSION["user"];
		}
		else{
			$user=NULL;
		}
		
		return $user["$data"];
	}
	public function destroy_userdata(){
		return session_destroy();
	}
	// Session - end
}
?>