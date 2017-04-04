<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'process/functionList.php';

if (!fSessionCheck())
{
    header("Location: $base_url/login");
}
?>

<div class="main-menu">
    <div class="main-menu-screen">
        <div class="menu_simple" id="listMenu">
        <ul>
        <li><a href="<?php echo $base_url;?>/postlist">LIST POST</a></li>
        <li><a href="<?php echo $base_url;?>/post">ADD POST</a></li>
        <?php
            if (getUserRole() == 1)
            echo '<li><a href="'.$base_url.'/userlist">MANAGE USER</a></li>';
        ?>
        <ul>
        </div>
        <br>
        <br>
        <br>
        <div>
        <form method="post" action="<?php echo $base_url;?>/editProfile">
            <input class="btny btn-primary btn-large btn-block" type="submit" name="editProfile" value="Edit Profile">
        </form>
        </div>
        <form method="post" action="<?php echo $base_url;?>/logout/process">
            <input class="btny btn-primary btn-large btn-block" type="submit" name="logout" value="LOG OUT">
        </form>
        </div>
    </div>
</div>