<?php

include_once("config.php");

if($_GET["error"]){
	exit($_GET["error"]." : ".$_GET["error_description"]);
}else if($_GET["code"]){
    try {
    	if(isset($_SESSION["access_token"])){ //之前連動過就先取消
    		$lineNotify->rmToken($_SESSION["access_token"]);
    		unset($_SESSION["access_token"]);
    	}
		$_SESSION["access_token"] = $lineNotify->getToken($_GET["code"]); //暫時用session記
        $lineNotify->snedNotify($_SESSION["access_token"],["message" => "\n嗨"]);
        $_SESSION["apiRateLimit"] = $lineNotify->getApiRateLimit();
        header("Location: index.php");
    }catch(Exception $e){
        exit($e->getMessage());
    }
}