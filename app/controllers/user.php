<?php

require_once '../app/models/fib.php';
require_once '../app/controllers/Controller.php';

class Main extends Controller{
	
	public function __construct() {
		$this->fib = new Fib();
	}
	
	public function index(){
		$slike = array();
		for ($i=1 ; $i<31 ; $i++){
			$slike["slika_id_".$i] = "img/thumb/ex{$i}.jpg";
		}
	
		$data = array(
				"slike" => $slike,
				"username" => ""
		);
	
		$this->show("index.html.php",$data);
	
	}
	
	public function signup(){
		$data = array(
				"username" => ""
		);
		
		$this->show("signup.html.php", $data);
	}
	
	public function singlePic($id){
		$slike = array();
		for ($i=1 ; $i<31 ; $i++){
			$slike["slika_id_".$i] = "img/original/ex{$i}.jpg";
		}
		
		$data = array(
				"slika" => $slike[$id]
		);
	
		$this->show("big_image.html.php",$data);
	
	}
	
	
	public function search(){
		$this->fibIt(1000);
	}
	
	public function fibIt($n){
		$data = array();
		$data["fib"] = $this->fib->getNumbers($n);
		$data["username"] = "dwww";
		$data["priimek"] = "dwww";
		
		$this->show("fib.html.php", $data);
		
	}

}

