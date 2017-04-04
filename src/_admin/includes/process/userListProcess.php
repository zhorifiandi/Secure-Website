<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'functionList.php';
try{
	$stmt = $db->prepare("SELECT SHA1(`user_id`) as user_id, `name`, `username`, `role` ,`passwd_expdate`,`status` 
						  FROM `user` 
						  WHERE role=0");
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if (fSessionCheck()) 
	{
		if (isset($_POST['reset'])){
			$statement = $db->prepare("UPDATE user SET password=SHA1('user123') WHERE user_id=?");
			$statement->execute(array($_POST['_track']));
			header("Location: $base_url/userlist");
			exit;
		}else if (isset($_POST['active'])){
			$status=(strcmp($_POST['active'],"Activate")==0 )?"1":"0";
			$statement = $db->prepare("UPDATE user SET status=? WHERE SHA1(user_id)=?");
			$statement->execute(array($status,$_POST['_token']));
			header("Location: $base_url/userlist");
			exit;
		}
		
	}else
		header("Location: $base_url/login");
	
}catch(PDOException $ex) {
	echo "There are some problems in our database. Please try again later.";
	exit;
}
?>