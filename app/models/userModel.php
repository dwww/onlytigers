<?php

require_once '../app/helper/Db.php';
require_once '../app/helper/Functions.php';

class UserModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	
	public function addUser($username, $email, $gender, $passwd){
		//var_dump($_POST);
		$salt=generateSalt();
		$pass = md5($passwd."something.".$salt);
		$query='INSERT INTO user (user, password, salt, email, gender, rights, status) VALUES (?,?,?,?,?,?,?);';
		$data = array("$username","$pass","$salt","$email","$gender",'1','1');
		$this->db->query($query, $data);
		
		
	}
	
	public function signin($username, $password){
		$query = "select * from user where user=?";
		
		$result = $this->db->query($query, array($username));
		
		$expire = time() + 3600*24*5;

		if (fromPost("remember-me") == "1"){
			$expire = 0;
		}
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$pass = md5($password."something.".$row['salt']);
			var_dump($pass);
			if ($row['password'] === $pass){
				setcookie("username", stripslashes($row['user']), $expire);
				setcookie("userid", stripslashes($row['id']), $expire);
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
	
	public function getUserId(){
		if (isset($_COOKIE["userid"])){
			return $_COOKIE["userid"];
		}
		return "";
	}
	
	public function signup($username, $password){
		
		echo "todo";
	}
	
	public function signout(){
		setcookie("username", "", time() -1000);
		setcookie("userid", "", time() -1000);
	}
	
	
	
}