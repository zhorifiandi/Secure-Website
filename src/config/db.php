<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$db_hostname='localhost'; $db_username='root'; $db_password='root'; $dbname='miniblog_db';
try {
	$db = new PDO('mysql:host='.$db_hostname.';dbname='.$dbname.';charset=utf8', $db_username, $db_password);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e) {
	echo "Failed to connect database";
	die();
}

date_default_timezone_set("Asia/Jakarta");
?>