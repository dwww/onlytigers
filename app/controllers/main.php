<?php

require_once '../app/models/fib.php';
require_once '../app/controllers/Controller.php';

class Main extends Controller{
	
	public function __construct() {
		$this->fib = new Fib();
	}
	
	public function index(){	
		$data = array(
				"slike" => array(
						"img/thumb/ex1.jpg",
						"img/thumb/ex3.jpg",
						"img/thumb/ex2.jpg",
						"img/thumb/ex4.jpg",
						"img/thumb/ex1.jpg",
						"img/thumb/ex2.jpg",
						"img/thumb/ex3.jpg",
						"img/thumb/ex4.jpg",
						"img/thumb/ex4.jpg",
						"img/thumb/ex5.jpg",
						"img/thumb/ex5.jpg",
						"img/thumb/ex1.jpg",
						"img/thumb/ex2.jpg",
						"img/thumb/ex3.jpg",
						"img/thumb/ex4.jpg",
						"img/thumb/ex5.jpg",
				),
				"username" => ""
		);
		
		$this->show("index.html.php",$data);
		
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

