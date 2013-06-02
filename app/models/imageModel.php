<?php

require_once '../app/helper/Db.php';

class ImageModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	
	public function upload_image($title, $tags, $description, $name, $size, $type){
	
		// Make sure the user actually
		// selected and uploaded a file
		//echo "<pre>";var_dump($GLOBALS);
		//var_dump($_POST);
		
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
			$content=base64_encode(file_get_contents($_FILES['image']['tmp_name']));
			$data = array("$name","$title","$description","$type", "$content", "$size");
			$query="INSERT INTO picture (fileName, name, description, fileType, imageData, fileSize, user_id) VALUES (?,?,?,?,?,?,1)";
			$this->db->query($query, $data);
			
			$keywords = preg_split("/[\s,]+/", $tags);
			
			/*
			// Temporary file name stored on the server
			$tmpName = $_FILES['image']['tmp_name'];
	
			// Read the file
			$fp = fopen($tmpName, 'r');
			$data = fread($fp, filesize($tmpName));
			$data = addslashes($data);
			fclose($fp);
			
			
			
			// Create the query and insert
			// into our database.
			$query = "INSERT INTO tbl_images ";
			$query .= "(image) VALUES ('$data')";
			//$results = mysql_query($query, $link);
	
			// Print results
			echo "Thank you, your file has been uploaded.";
			*/
			echo"Picture was uploaded successfully";
		}
		else {
			echo "No image selected/uploaded";
		}
	
	
	}
}