<?php

require_once '../app/models/userModel.php';

class Controller {
	
	public function show($view, $data = array()){
		
		foreach ( $data as $key => $value ) {
			$$key = $value;
		}
	
		// works
		ob_start();
		include ("../app/views/".$view);
		$output = ob_get_contents();
		ob_end_clean();
	
		// also works
		/*$file = file_get_contents("../app/views/".$view);
			$output = eval("?>$file");*/
	
		echo $output;
	
	}
	
	public function getDefData(){
		$u = new UserModel();
		$data = array(
				"username" => $u->getUsername()
		);
		return $data;
	}
	
}