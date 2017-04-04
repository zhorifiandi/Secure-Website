<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

switch ($uri2) {
    case '':
    case 'home':
        include('includes/home.php');
        break;

    case 'login':

        if($uri3 == 'process'){
            include('includes/process/loginProcess.php');
        }else{
            include('includes/login.php');
        }
        break;

    case 'logout':
        if($uri3 == 'process'){
            include('includes/process/logoutProcess.php');
        }
        break;

    case 'editProfile':
        if($uri3 == 'process'){
            include('includes/process/editProfileProcess.php');
        }else{
            include('includes/editProfile.php');
        }
        break;

    case 'post':
        if($uri3 == 'process'){
            include('includes/process/postProcess.php');
        }else{
            include('includes/post.php');
        }
        break;

    case 'userlist':
        if($uri3 == 'process'){
            include('includes/process/userListProcess.php');
        }else{
           include('includes/userList.php');
        }
        
        break;

    case 'postlist':
        if($uri3 == 'process'){
            include('includes/process/postListProcess.php');
        }else{
           include('includes/postList.php');
        }
        
        break;
    
    default:
        include('includes/404.php');
        break;
}
?>