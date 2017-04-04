<?php
session_start();
define('BASEPATH', 'random');
require_once('../config/db.php');
include '../_admin/includes/process/functionList.php';

if ( isset($_POST["name"]) && isset($_POST["email"]) && (isset($_POST["xid"]) and !empty($_POST["xid"])) ) {
	if (($_SESSION['captcha']['code']==$_POST['captcha']) && (!empty($_POST['comment']) && (!empty($_POST['name'])) && (!empty($_POST['email'])))){

		$author_c = htmlspecialchars($_POST['name']);
		$post_id = htmlspecialchars($_POST['xid']);
		$email_c = htmlspecialchars($_POST['email']);
		$content_c = htmlspecialchars($_POST['comment']);
		$created_date_c = date('d F Y H:i');
		
		$email_c = filter_var($email_c, FILTER_SANITIZE_EMAIL);

		if (!filter_var($email_c, FILTER_VALIDATE_EMAIL) === true) {
			echo "Error! Invalid email address.";
			exit;
		}
		
		try {
			$statement = $db->prepare("INSERT INTO `comment`(`comment_id`, `post_id`, `name`, `email`, `content`, `status`, `created_date`) VALUES (NULL,?,?,?,?,1,?)");

			$statement->execute(array(
				$post_id,$author_c,$email_c,$content_c, date("Y-m-d H:i:s")
				)
			);
			
			echo '<div class="blog-cmt">
						<h5><i class="fa fa-user"></i> &nbsp; <b>'.$author_c.'</b> <span> on '.$created_date_c.'</span></h5>
						<div class="cmt-content">'.$content_c.'</div>
					</div>'; 
			
		}catch(PDOException $ex) {
echo "Error! There are some problems in our database. Please try again later.";
			echo $ex;
			exit;
		}

		echo '<div class="blog-cmt">
			<h5><i class="fa fa-user"></i> &nbsp; <b>'.$author_c.'</b> <span> on '.$created_date_c.'</span></h5>
			<div class="cmt-content">'.$content_c.'</div>
		</div>'; 
		
		exit;
	}else {
		$msg = "Error! Captcha salah atau ada data yang masih kosong";
		exit($msg);
	}

}else{   
	exit('Error! No direct script access allowed');
}
