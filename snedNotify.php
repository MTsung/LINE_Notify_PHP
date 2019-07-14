<?php

include_once("config.php");

try {
	if($_POST){
		$lineNotify->snedNotify($_SESSION["access_token"],$_POST);
		$_SESSION["apiRateLimit"] = $lineNotify->apiRateLimit;
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}
}catch(Exception $e){
    exit($e->getMessage());
}
