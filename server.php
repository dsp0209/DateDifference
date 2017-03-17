<?php
require_once "DateDifference.php";
require_once "auth.php";
if(!isset($_SERVER['PHP_AUTH_USER'])){
	header('WWW-Authenticate: Basic realm="Myrealm"');
	header('HTTP/1.0 401 Unauthorized');
 	exit;
  } else {
	if($_SERVER['PHP_AUTH_USER'] == $auth['login'] && $_SERVER['PHP_AUTH_PW'] == $auth['passwd']){
		ini_set("soap.wsdl_cache_enabled", "0");
		//create soap server
		try{
		$server = new SoapServer("dateDifference.wsdl");
		//class with our methods
		$server->setClass("DateDifference");
		//start server
		$server->handle();
		} catch (ExceptionFileNotFound $e) {
		echo 'Error message: ' . $e->getMessage();
}
 	}
 }
