<?php

require_once '../app/controllers/Controller.php';
require_once '../app/models/userModel.php';

class User extends Controller{
	
	public function __construct() {
		$this->userModel = new UserModel();
	}
	
	
	public function signup(){
		$data = array(
				"username" => ""
		);
		
		$this->show("signup.html.php", $data);
	}
	
	public function upload(){
		$data = array(
				"username" => ""
		);
		
		$this->show("fileupload.html.php", $data);
	}
	
	public function signin(){
		echo "todo";
	}
	
	public function addUser(){
		$this->userModel->addUSer();
		echo "dodaj userja";
	}

}

