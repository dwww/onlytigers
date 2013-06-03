<?php

require_once '../app/controllers/Controller.php';
require_once '../app/models/commentModel.php';
require_once '../app/models/imageModel.php';

class Main extends Controller{
	
	public function __construct() {
		$this->commentModel = new CommentModel();
		$this->imageModel = new ImageModel();
	}
	
	public function index(){
		$tmpSlike = $this->imageModel->getImages(0,50);
		$slike = array();
		foreach ($tmpSlike as $slika) {
			$id = $slika["id"];
			$slike[$id] = "?page=img&id={$id}";
		}
		
		$data = $this->getDefData();
		
		$data["slike"] = $slike;
			
		$this->show("index.html.php",$data);
	
	}

		
	public function singlePic($id){
		if ($id == ""){
			die("");
		}
		
		$data = $this->getDefData();
		$data["slika"] = "?page=img&id={$id}";
		$data["slikaid"] = $id;
		$data["comments"] = $this->commentModel->getComments($id);
		
		$this->show("big_image.html.php",$data);
	
	}
	
	
	public function search(){
		
	}
	
	public function error404(){
		$data = $this->getDefData();
		$data["error"] = "Tiger not found!";
		$this->show("error.html.php", $data);
	}
	
	
	/**
	 * page=img&id=11
	 */
	public function showImage(){
		$imgId = fromGet("id");		
		$img = $this->imageModel->get($imgId);
		
		if ($img){
			header('Content-type: ' . 'image/'.$img['fileType']);
			echo stripslashes($img['imageData']);
		}else {
			echo "404";
		}
	}
	
}

