<?php

require_once '../app/helper/Db.php';
require_once '../app/helper/Functions.php';

class CommentModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	
	public function addComment($username, $comment, $imageID){
		$query = "select * from user where user=?";
		
		$result = $this->db->query($query, array($username));
		
		
		//var_dump($_POST);
		$salt=generateSalt();
		$pass = md5($passwd."something.".$salt);
		$query='INSERT INTO user (user, password, salt, email, gender, rights, status) VALUES (?,?,?,?,?,?,?);';
		$data = array("$username","$pass","$salt","$email","$gender",'1','1');
		$this->db->query($query, $data);
		
		
	}

	
	public function getComments($imageId){
		
	}
}