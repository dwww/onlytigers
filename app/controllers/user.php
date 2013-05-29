<?php

require_once '../app/controllers/Controller.php';

class User extends Controller{
	
	public function __construct() {
	}
	
	
	public function signup(){
		$data = array(
				"username" => ""
		);
		
		$this->show("signup.html.php", $data);
	}
	
	public function signin(){
		echo "todo";
	}
	
	public function addUser(){
		echo "dodaj userja";
	}

}

