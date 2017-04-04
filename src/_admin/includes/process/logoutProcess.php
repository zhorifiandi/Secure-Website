<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (isset($_POST["logout"])){
    if (isset($_SESSION['user_id']))
        unset($_SESSION['user_id']);
    if (isset($_SESSION['user_role']))
        unset($_SESSION['user_role']);
    session_destroy();
    header("Location: $base_url");
    exit;
}