<?php

require_once '../app/controllers/Controller.php';
require_once '../app/models/userModel.php';
require_once '../app/models/imageModel.php';

class User extends Controller{
	
	public function __construct() {
		$this->userModel = new UserModel();
		$this->imageModel = new ImageModel();
	}
	
	public function signup(){
	
		$data = $this->getDefData();
				
		$this->show("signup.html.php", $data);
	}
	
	public function upload(){
		$data = $this->getDefData();
		$this->show("fileupload.html.php", $data);
	}

	public function upload_image(){
		$title=$_POST['title'];
		$tags=$_POST['tags'];
		$description=$_POST['description'];
		$name=basename($_FILES['image']['name']);
		$size=basename($_FILES['image']['size']);
		$type=basename($_FILES['image']['type']);
		$this->imageModel->upload_image($title, $tags, $description, $name, $size, $type);
	}
	
	public function pic_upload(){
		$data = $this->getDefData();
		$this->show("uptiger.html.php", $data);
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
		$username = fromPost("fname");
		$email = fromPost("email");
		$gender = fromPost("gender");
		$passwd = fromPost("passwd");
		$conpasswd = fromPost("conpasswd");
		if($passwd == $conpasswd && $username != "" && $email != "" && $passwd != ""){
			$this->userModel->addUSer($username, $email, $gender, $passwd);
			$data = $this->getDefData();
			header("Location: http://www.onlytigers.com/");
		}else{
			$data = $this->getDefData();
			$data["error"] = "Passwords do not match!";
			$this->show("error.html.php", $data);
		}
	}
	
	public function signout(){
		$this->userModel->signout();
		header("Location: http://www.onlytigers.com/");
	}
	

}

