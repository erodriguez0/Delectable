<?php
// connect to db
$db = array(
	"name" => "delectable",
	"user" => "root",
	"pass" => "Uc200760cL",
	"host" => "127.0.0.1"
);

$dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
$conn = new PDO($dsn, $db['user'], $db['pass']);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// intialize session
if(session_status() == PHP_SESSION_NONE) { 
	session_start(); 
}

// define paths
define(LAYOUT_IMG_PATH, $_SERVER['DOCUMENT_ROOT'] . '/delectable/respurces/img/');
define(RESOURCE_PATH, $_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/');
define(INCLUDE_PATH, $_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/');
define(HOME, $_SERVER['DOCUMENT_ROOT'] . '/delectable/public_html/');
define(SCRIPTS_PATH, $_SERVER['DOCUMENT_ROOT'] . '/delectable/resources/scripts/');
?>