<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

try{
	$stmt = $db->prepare("SELECT `post_id`, `title`, `content`, `name`, `created_date` FROM `post` INNER JOIN `user` ON `post`.`user_id`=`user`.`user_id` WHERE `post`.`status`='posted' AND `post_id`=:postid");
    $stmt->bindParam(':postid', $uri2, PDO::PARAM_INT, 11);
    $stmt->execute();
    $count = $stmt->rowCount();

    if($count == 0) {
        include('includes/404.php');
        exit;
    } else {
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row) {
            $post_id = $row['post_id'];
            $title = $row['title'];
            $content = $row['content'];
            $author = $row['name'];
            $created_date = date('d F Y H:i', strtotime($row['created_date']));
        }

        $stmt = $db->prepare("SELECT `comment`.* FROM `post` INNER JOIN `user` ON `post`.`user_id`=`user`.`user_id` INNER JOIN `comment` ON `post`.`post_id`=`comment`.`post_id` WHERE `post`.`status`='posted' AND `comment`.`status`='1' AND `comment`.`post_id`=:postid");
        $stmt->bindParam(':postid', $post_id, PDO::PARAM_INT, 11);
        $stmt->execute();
        $count_c = $stmt->rowCount();
        $rows_c = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}catch(PDOException $ex) {
	echo "There are some problems in our database. Please try again later.";
	exit;
}

include('_admin/includes/process/functionList.php');
$_SESSION['captcha'] = simple_php_captcha();

?>
<?php require('includes/header.php');?>
<div id="header" class="single-post-header">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center ">
                    <h1> <?php echo $title;?> </h1>
                    <h4> - <?php echo 'Posted by '.$author.' on '.$created_date?> </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="blog-post">
                    <a href="<?php echo $base_url;?>" class="btn btn-default btn-md pull-left "><i class="fa fa-angle-left"></i> Back Home </a>        
                    <br><br>
                    <div class="post-content"><?php echo $content;?></div>
                </div>
            </div>
            <div class="col-md-8 col-md-offset-2 blog-comments">
                <h2>Comments</h2>
                <div class="list" id="listComment">
                    <?php
                    foreach($rows_c as $row) {
                        $comment_id = $row['comment_id'];
                        $author_c = $row['name'];
                        $email_c = $row['email'];
                        $content_c = $row['content'];
                        $created_date_c = date('d F Y H:i', strtotime($row['created_date']));

                        echo '<div class="blog-cmt">
                            <h5><i class="fa fa-user"></i> &nbsp; <b>'.$author_c.'</b> <span> on '.$created_date_c.'</span></h5>
                            <div class="cmt-content">'.$content_c.'</div>
                        </div>'; 
                    }
                    ?>
                </div>
                <div class="form">
                    <form class="form-horizontal" action="<?php echo $base_url;?>/ajax/sendComment.php" method="post" id="cmtSend">
                    	<input type="hidden" name="xid" value="<?php echo $post_id;?>" />
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cmt">Comment:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="cmt" name="comment" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                        	<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" >';?>
      						<input id="captcha" type="text" name="captcha" autofocus placeholder="Captcha..."/>&nbsp;<font color="red"><?php echo (!empty($msg))?$msg:"";?></font>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php');?>
<script>
$(function(){
	function emailValidator(text){
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if(text.match(emailExp)){
			return true;
		}else{
			return false;
		}
	}
	
	$("#cmtSend").submit(function(){
		var form = $(this);
		if($('#name').val().trim() == ""){
			alert("Nama masih kosong");
		}else if($('#email').val().trim() == ""){
			alert("Email masih kosong");
		}else if(emailValidator($("#email").val()) === false){
			alert("Format email tidak sesuai");
		}else if($('#cmt').val().trim() == ""){
			alert("Komentar masih kosong");
		}else if($('#captcha').val().trim() == ""){
			alert("Captcha masih kosong");
		}else{
			$.ajax({
				type:"POST",
				url:form.attr("action"),
				data:form.serialize(),
				success: function(response){
					if(response.indexOf("Error") < 0) {
						//$("#listComment").append(response);  
						location.reload();
					}else{
						alert(response);
					}
				},
				error: function(response){
					alert("Error when sending data");
				}
			});
		}
		
		return false;
	});
});
</script>