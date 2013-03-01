<?php

require_once '../app/models/fib.php';

class Main {
	
	public function index(){	
		$data = array(
				"ime" => "jan",
				"priimek" => "vatovec"
		);
		echo "<pre>";
		
		foreach ( $data as $key => $value ) {
			$$key = $value;
		}
		
		$output = include ("../app/views/index.html.php");
		echo $output;
		
	}
	
	
	public function search(){
		$this->fibIt(1000);
	}
	
	public function fibIt($n){
	
		$f = new Fib();
		
		$data = array();
		$data["fib"] = $f->getNumbers($n);
		$data["username"] = "dwww";
		$data["priimek"] = "dwww";
		
		$this->show("fib.html.php", $data);
		
		
	}
	
	private function show($view, $data){
		foreach ( $data as $key => $value ) {
			$$key = $value;
		}
		
		$output = include ("../app/views/".$view);
		echo $output;
		
	}
	
}

