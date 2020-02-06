<?php
// require once classes

// connect to db
$db = array(
	"name" => "delectable",
	"user" => "root",
	"pass" => "Uc200760cL",
	"host" => "127.0.0.1"
);

$dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['name'];
$conn = new PDO($dsn, $db['user'], $db['pass']);

// intialize session
if(session_status() == PHP_SESSION_NONE) { 
	session_start(); 
}

// initialize session variables
?>