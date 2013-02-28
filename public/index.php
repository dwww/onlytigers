<?php


include_once '../app/controllers/main.php';

$m = new Main();

if (!isset($_GET["page"])){
	$_GET["page"] = "";
}

switch ($_GET["page"]){
	case "index":
		$m->index();
		break;
	case "login":
		$m->login();
		break;
	case "register":
		$m->register();
		break;
	case "search":
		$m->search();
		break;
	case "view":
		$m->view();
		break;
	default:
		$m->index();
		break;
}
