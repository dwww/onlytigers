<?php


function fromPost($instr = ""){
	if (!isset($_POST[$instr])){
		return "";
	}
	return $_POST[$instr];
}

function fromGet($instr = ""){	
	if (!isset($_GET[$instr])){
		return "";
	}
	return $_GET[$instr];
}

function generateSalt(){
	$rand=rand(1,100000);
	$tmp=md5($rand);
	$salt=substr($tmp,0,20);
	return $salt;	
}