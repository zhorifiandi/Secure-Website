<?php
session_start();
session_regenerate_id();
define('BASEPATH', 'random_admin');
require_once('../config/baseurl.php');
require_once('../config/db.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Mini Blog</title>
    <meta content="IF5191 - Mini Blog" name="description">
    <meta content="origin-when-cross-origin" name="referrer">
    <link rel="stylesheet" media="all" href="../css/styles.css">

    <script src="js/advanced.js" ></script>
    <script src="js/wysihtml5-0.3.0.js" ></script>
</head>
<body>
    <?php
        require('includes/route.php');
    ?>

    <script src="<?php echo $site_url?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo $site_url?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_url?>/assets/admin-lte/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo $site_url?>/assets/admin-lte/js/demo.js" type="text/javascript"></script>
</body>
</html>