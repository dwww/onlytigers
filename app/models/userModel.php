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
		$data = array("$username","$pass","$salt","$email","$gender",'0','1');
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
				setcookie("userrights", stripslashes($row['rights']), $expire);
				return true;
			}
		}

		return false;
	}
	
	private function fromCookie($tag){
		if (isset($_COOKIE[$tag])){
			return $_COOKIE[$tag];
		}
		return "";
	}
	
	public function getUsername(){
		return $this->fromCookie("username");
	}
	
	public function getUserId(){
		return $this->fromCookie("userid");
	}
	
	public function getUserRigths(){
		return $this->fromCookie("userrights");
	}
	
	public function signout(){
		setcookie("username", "", time() -1000);
		setcookie("userid", "", time() -1000);
		setcookie("userrights", "", time() -1000);
	}
	
}