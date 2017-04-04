<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

try{
	$stmt = $db->prepare("SELECT `post_id`, `title`, `content`, `name`, `created_date` FROM `post` INNER JOIN `user` ON `post`.`user_id`=`user`.`user_id` WHERE `post`.`status`='posted'");
    $stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $ex) {
	echo $ex;
	exit;
}
?>
<?php require('includes/header.php');?>
<div id="header">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 text-center ">
                    <h1> I  Only Post Creative Stuff That Will Blow Minds </h1>
                    <h4> - Jhon Anderson </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php
                foreach($rows as $row) {
                    $post_id = $row['post_id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $author = $row['name'];
                    $created_date = date('d F Y H:i', strtotime($row['created_date']));

                    echo '<div class="blog-post">
                        <h1>'.$title.'</h1>
                        <h4>Posted by '.$author.' on '.$created_date.'</h4>
                        <div class="post-content">'.$content.'</div>
                        <a href="'.$base_url.'/article/'.$post_id.'" class="btn btn-info btn-md ">Read More <i class="fa fa-angle-right"></i></a>
                    </div>'; 
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php');?>
