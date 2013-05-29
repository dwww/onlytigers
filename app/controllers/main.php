<?php

require_once '../app/controllers/Controller.php';

class Main extends Controller{
	
	public function __construct() {
	
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
		
	}
	

}

