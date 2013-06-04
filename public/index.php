<?php

error_reporting(E_ALL);

ini_set("display_errors", 1);


include_once '../app/controllers/main.php';
include_once '../app/controllers/user.php';
include_once '../app/helper/Functions.php';

$m = new Main();
$usr = new User();
$page = fromGet("page");


$page = $page == "" ? "index" : $page;

switch ($page){
	case "index":
		$m->index();
		break;
	case "search":
		$m->search();
		break;
	case "view":
		$m->view();
		break;
	case "single":
		$m->singlePic(fromGet("id"));
		break;
	case "signin":
		$usr->signin();
		break;
	case "signout":
		$usr->signout();
		break;
	case "signup":
		$usr->signup();
		break;
	case "signup_ap":
		$usr->signup_ap();
		break;
	case "adduser":
		$usr->addUser();
		break;
	case "upload":
		$usr->upload();
		break;
	case "upload_image":
		$usr->upload_image();
		break;
	case "pic_upload":
		$usr->pic_upload();
		break;	
	case "add_comment":
		$usr->addComment();
		break;
	case "changeStatus":
		$usr->changeImageStatus();
		break;
	case "test_db":
		$imm = new ImageModel();
		$imm->testDb();
		break;
	case "img":
		$m->showImage();
		break;
	default:
		$m->error404();
		break;
}
