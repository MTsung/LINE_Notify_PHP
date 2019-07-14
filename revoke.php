<?php

include_once("config.php");

try {
	if(isset($_SESSION["access_token"])){
		$lineNotify->rmToken($_SESSION["access_token"]);
	}
	unset($_SESSION["access_token"],$_SESSION["apiRateLimit"]);
	header("Location: ".$_SERVER["HTTP_REFERER"]);
}catch(Exception $e){
    exit($e->getMessage());
}