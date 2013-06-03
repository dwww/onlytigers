<?php

require_once '../app/helper/Db.php';

class ImageModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	public function testDb(){
		echo "<pre>";
		$tags = "t, rsssawr dfdangeoruse";
		
		$keywords = preg_split("/[\s,]+/", $tags);
			
		$query = "INSERT INTO tags (tag) VALUES (?)";

		var_dump($keywords);
		foreach($keywords as $tag){
			echo $tag;
			$this->db->query($query, array($tag), true);
		}
	}
	
	public function get($id){
		$query = "SELECT * FROM picture WHERE id=?";
	
		$result = $this->db->query($query, array($id));
		
		if ($result){
			return $result->fetch_assoc();
		}
		return false;
	}
	
	public function upload_image($title, $tags, $description, $name, $size, $type){
	
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
			$content=base64_encode(file_get_contents($_FILES['image']['tmp_name']));
			$data = array("$name","$title","$description","$type", "$content", "$size");
			$query="INSERT INTO picture (fileName, name, description, fileType, imageData, fileSize, user_id) VALUES (?,?,?,?,?,?,1)";
			$this->db->query($query, $data);
			
			$idof = $this->db->mysqli->insert_id;
			
			$keywords = preg_split("/[\s,]+/", $tags);
			
			$query = "INSERT INTO tags (tag) VALUES (?)";
			$select = "INSERT INTO picture_has_tags (picture_id, tags_id) VALUES (?, (select id from tags where tag = ?))";
			
			foreach($keywords as $tag){
				$this->db->query($query, array($tag));
				$this->db->query($select, array($idof, $tag));
			}
			
			echo"Picture was uploaded successfully";
		}
		else {
			echo "No image selected/uploaded";
		}
	
	
	}
}