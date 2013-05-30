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
		
		$data = $this->getDefData();
		
		$data["slike"] = $slike;
			
		$this->show("index.html.php",$data);
	
	}

		
	public function singlePic($id){
		if ($id != ""){
			die("");
		}
		$slike = array();
		for ($i=1 ; $i<31 ; $i++){
			$slike["slika_id_".$i] = "img/original/ex{$i}.jpg";
		}
		
		$data = $this->getDefData();
		$data["slika"] = $slike[$id];
	
		$this->show("big_image.html.php",$data);
	
	}
	
	
	public function search(){
		
	}
	

}

