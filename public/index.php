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
	case "fib":
		if (!isset($_GET["n"]) || $_GET["n"]<0 || $_GET["n"] > 100){
			$_GET["n"] = 10;
		}
		$m->fibIt($_GET["n"]);
		break;
	default:
		$m->index();
		break;
}
