<?php

require_once '../app/controllers/Controller.php';
require_once '../app/models/userModel.php';

class User extends Controller{
	
	public function __construct() {
		$this->userModel = new UserModel();
	}
	
	public function signup(){
		$data = $this->getDefData();
				
		$this->show("signup.html.php", $data);
	}
	
	public function upload(){
		$data = $this->getDefData();
		$this->show("fileupload.html.php", $data);
	}
		
	public function signin(){
		$username = fromPost("username");
		$password = fromPost("password");
		
		
		if($this->userModel->signin($username, $password)){
			header("Location: http://www.onlytigers.com/");
		}else{
			$data = $this->getDefData();
			$data["error"] = "Wrong username or password!";
			$this->show("error.html.php", $data);
		}
	}
	
	
	public function addUser(){
		$this->userModel->addUSer();
		echo "dodaj userja";
	}
	
	public function signout(){
		$this->userModel->signout();
		header("Location: http://www.onlytigers.com/");
	}
	
}

