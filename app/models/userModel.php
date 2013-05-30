<?php

require_once '../app/helper/Db.php';

class UserModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	public function addUser(){
		var_dump($_POST);
	}
	
	public function signin($username, $password){
		$query = "select * from user where user=?";
		
		$result = $this->db->query($query, array($username));
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$pass = md5($password."something.".$row['salt']);
			var_dump($pass);
			if ($row['password'] === $pass){
				setcookie("username", stripslashes($row['user']), time() + 3600*24*5);
				return true;
				
			}
		}

		return false;
	}
	
	public function getUsername(){
		if (isset($_COOKIE["username"])){
			return $_COOKIE["username"];
		}
		return "";
	}
	
	public function signup($username, $password){
		
		echo "todo";
	}
	
	public function signout(){
		setcookie("username", "", time() -1000);
	}
	
	
	
}