<?php

error_reporting(E_ALL);

ini_set("display_errors", 1);


include_once '../app/controllers/main.php';
include_once '../app/controllers/user.php';
include_once '../app/helper/Functions.php';

$m = new Main();
$usr = new User();

switch (fromGet("page")){
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
	case "adduser":
		$usr->addUser();
		break;
	case "upload":
		$usr->upload();
		break;
	default:
		$m->index();
		break;
}
