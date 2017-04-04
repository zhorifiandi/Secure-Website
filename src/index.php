<?php
session_start();
error_reporting(0);
define('BASEPATH', 'random');
require_once('config/baseurl.php');
require_once('config/db.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Mini Blog</title>
    <meta content="IF5191 - Mini Blog" name="description">
    <meta content="origin-when-cross-origin" name="referrer">
    <link href="<?php echo $base_url?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $base_url?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" media="all" href="<?php echo $base_url;?>/css/styles.css">
</head>
<body>
    <?php
        require('includes/route.php');
    ?>
</body>
</html>