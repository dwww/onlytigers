<?php

require_once '../app/helper/Db.php';
require_once '../app/helper/Functions.php';

class CommentModel{
	
	public function __construct(){
		$this->db = new Db();
	}
	
	
	public function addComment($userId, $comment, $imageId){
				
		$query="INSERT INTO `onlytigers`.`comment` (`text`, `picture_id`, `upVote`, `downVote`, `score`, `status`, `user_id`) VALUES ( ? , ?, ?, ?, ?, ?, ?)";

		$data = array("$comment","$imageId","1","0","1",'1',"$userId");
		$this->db->query($query, $data);
		
	}

	
	public function getComments($imageId){
		
		$query="SELECT comment.*, user FROM comment LEFT JOIN user ON  user.id=comment.user_id WHERE picture_id=? ORDER BY created DESC, score DESC";
		
		$data = array("$imageId");
		
		$res = array();
		if ($result = $this->db->query($query, $data)) {
			while ($row = $result->fetch_assoc()) {
				$res[] = $row;
			}
			$result->free();
		}
		
		return $res;
	}
}