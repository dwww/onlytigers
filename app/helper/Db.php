<?php

require_once '../app/config/Config.php';

class Db {
	
	public function __construct() {
		$this->db_connect();
	}
	
	private function db_connect(){
		global $database;
		$DB_NAME = $database["dbname"];
		$DB_HOST = $database["server"];
		$DB_USER = $database["username"];
		$DB_PASS = $database["password"];
		
		$this->mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	
	private function db_close(){
		mysqli_close($this->mysqli);
	}
	
	public function query($query, $data = array(), $debug=false){
		
		$command = explode('?', $query." ");
		
		if((count($command)-1) != count($data)){
			return false;
		}

		$query = $command[0];
		
		for ($i = 0; $i < count($data); $i++){
			$clean = "'".$this->mysqli->real_escape_string($data[$i])."'";
			$query.=$clean.$command[$i+1];
		}
		
		if ($debug) echo $query;
		
		$result = $this->mysqli->query($query);
		
		if(!$result && $debug){
			echo "<pre>";
			echo $this->mysqli->error.__LINE__;
			echo "\n</pre>";
		}
		
		return $result;
		
	}
	
}