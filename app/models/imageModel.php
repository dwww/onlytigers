<?php

require_once '../app/helper/Db.php';

class ImageModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	
	public function upload_image(){
	
		// Make sure the user actually
		// selected and uploaded a file
		echo "<pre>";var_dump($GLOBALS);
		var_dump($_POST);
		
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
	
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
			$results = mysql_query($query, $link);
	
			// Print results
			print "Thank you, your file has been uploaded.";
	
		}
		else {
			print "No image selected/uploaded";
		}
	
	
	}
}