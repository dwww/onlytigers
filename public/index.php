<?php

error_reporting(E_ALL);

ini_set("display_errors", 1);


include_once '../app/controllers/main.php';

$m = new Main();


if (!isset($_GET["page"])){
	$_GET["page"] = "";
}

switch ($_GET["page"]){
	case "index":
		$m->index();
		break;
	case "signin":
		$m->signin();
		break;
	case "signup":
		$m->signup();
		break;
	case "adduser":
		$m->adduser();
	case "search":
		$m->search();
		break;
	case "view":
		$m->view();
		break;
	case "single":
		if (isset($_GET["id"]) && $_GET["id"] !== ""){
			$m->singlePic($_GET["id"]);
		}
		break;
	default:
		$m->index();
		break;
}
