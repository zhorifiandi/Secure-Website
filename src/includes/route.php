<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

switch ($uri1) {
    case '':
        include('includes/list.php');
        break;

    case 'article':
        include('includes/article.php');
        break;
    
    default:
        include('includes/404.php');
        break;
}
?>