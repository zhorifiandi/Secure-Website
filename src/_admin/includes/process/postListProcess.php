<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'functionList.php';
try{
	if (isset($_POST['CSRFtoken'])) {
    		if (strcmp($_SESSION['CSRFtoken'],$_POST['CSRFtoken']) !== 0) {
			exit;
        	}
	}   
	unset($_SESSION['post_id']); 
	if (getUserRole()==1){
		$stmt = $db->prepare("SELECT u.name,SHA1(post_id) AS post_id,title,created_date,concat(substr(content,1,100),'"." ..."."') as content,last_updated,p.status 
						  FROM post p
						  JOIN user u ON p.user_id = u.user_id");
		
	}else{
		$stmt = $db->prepare("SELECT '' AS name, SHA1(post_id) AS post_id,title,created_date,concat(substr(content,1,100),'"." ..."."') as content,last_updated,status 
						  FROM post
						  WHERE user_id=:userid");
		
		$user_id = getUserId();
		$stmt->bindParam(':userid',$user_id, PDO::PARAM_INT);
	}
	
	$stmt->execute();
	
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	if (!fSessionCheck()) 
	{
		header("Location: $base_url/login");
	}else{
		if (isset($_POST['delete'])){
            if (strcmp($_POST['delete'],"Delete")==0){
				$statement = $db->prepare("DELETE FROM post WHERE user_id=? and SHA1(post_id)=?");
			    $statement->execute(array(getUserId(),$_POST['_track']));
			    header("Location: $base_url/postlist");
                exit;
            }else 
                header("Location: $base_url/postlist");
			
		}else if (isset($_POST['reset'])){
			$status=(strcmp($_POST['reset'],"Post")==0 )?"posted":"draft";
			$statement = $db->prepare("UPDATE post SET status=? WHERE user_id=? and SHA1(post_id)=?");
			$statement->execute(array($status,getUserId(),$_POST['_track']));
			header("Location: $base_url/postlist");
			exit;
		}else if (isset($_POST['edit'])){
            $_SESSION['post_id'] = $_POST['_track'];
            header("Location: $base_url/post");
        }		
	}		
	
	}catch(PDOException $ex) {
		echo "There are some problems in our database. Please try again later.".$ex;
		exit;
}
?>
