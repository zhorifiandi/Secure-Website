<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
include 'functionList.php';

$editProfileMsg="";
if (!fSessionCheck()){
    header("Location: $base_url/login");
} else {

    if (isset($_POST["changePassword"])){
        $editProfileMsg = checkPassword($_POST["newPassword"]);
        if (!empty($editProfileMsg)){
            //display message
        } else {
            $userid = $_SESSION['user_id'];
            $newPassword = $_POST["newPassword"];
            $new_exp_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 90 days'));

            try {
                $stmt = $db->prepare("UPDATE user SET password = sha1(:newPassword), passwd_expdate = :newExpDate WHERE user_id = :userId");

                $stmt->bindParam(':userId', $userid, PDO::PARAM_INT);
                $stmt->bindParam(':newPassword', $newPassword, PDO::PARAM_STR, 50);
                $stmt->bindParam(':newExpDate', $new_exp_date, PDO::PARAM_STR, 10);

                $stmt->execute();

                header("Location: $base_url/home");
                exit;
            }
            catch (PDOException $e)
            {
                echo "Failed to change password";
            }
        }
    }
}