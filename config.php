<?php 

session_start();
date_default_timezone_set("Asia/Taipei");

include_once("class/lineNotify.class.php");

define("CLIENT_ID","");
define("CLIENT_SECRET","");
define("CALLBACK_URL","http://localhost/LINE_Notify_PHP/callback.php");

if(!(CLIENT_ID && CLIENT_SECRET && CALLBACK_URL)){
	exit("請至config.php設定相關參數");
}
$lineNotify = new lineNotify(CLIENT_ID,CLIENT_SECRET,CALLBACK_URL);