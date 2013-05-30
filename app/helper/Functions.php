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