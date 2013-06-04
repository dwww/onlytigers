<?php

require_once '../app/helper/Db.php';
require_once '../app/models/userModel.php';

class ImageModel{

	public function __construct(){
		$this->db = new Db();
		$this->userModel = new UserModel();
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

	private function statusFilter($and=false){
		if ($this->userModel->getUserRigths() > 0){
			return "";
		}else{
			return ($and ? " AND " : " WHERE "). " status=1 ";
		}
	}
	
	public function get($id){
		
		$status = $this->statusFilter(true);

		$query = "SELECT * FROM picture WHERE id=? $status ";

		$result = $this->db->query($query, array($id));

		if ($result){
			$row = $result->fetch_assoc();
			$row['url'] = "?page=img&id={$row['id']}";
			return $row;
		}
		return false;
	}

	public function getImages($from, $count){
		
		$status = $this->statusFilter(false);
		
		$query = "SELECT * FROM picture $status LIMIT $from, $count"; //from in count ne smeta imeti narekovajev

		$result = $this->db->query($query);

		$res = array();
		if ($result = $this->db->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$row['url'] = "?page=img&id={$row['id']}";
				$res[] = $row;
			}
			$result->free();
		}

		return $res;
	}

	public function upload_image($title, $tags, $description, $name, $size, $type, $userId){

		if ($title == "") return false;

		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
				
			$content = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$data = array("$name","$title","$description","$type", "$content", "$size", $userId);
				
			$query = "INSERT INTO picture (fileName, name, description, fileType, imageData, fileSize, user_id, status) VALUES (?,?,?,?,?,?,?,1)";
			$result = $this->db->query($query, $data);

			$idof = $this->db->mysqli->insert_id;
			$keywords = preg_split("/[\s,]+/", $tags);

			$query = "INSERT INTO tags (tag) VALUES (?)";
			$select = "INSERT INTO picture_has_tags (picture_id, tags_id) VALUES (?, (select id from tags where tag = ?))";

			foreach($keywords as $tag){
				$this->db->query($query, array($tag));
				$this->db->query($select, array($idof, $tag));
			}

			return true;
		}

		return false;
	}
}