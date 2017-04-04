<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$loginMsg = "";
if (isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_pwd = sha1($password);

    try {
        //$stmt = $db->prepare("SELECT * FROM user WHERE username = :username AND password = :password AND status = 1");

        //$stmt->bindParam(':username', $username, PDO::PARAM_STR, 16);
        //$stmt->bindParam(':password', $hashed_pwd, PDO::PARAM_STR, 50);

        $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR, 16);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count < 1){
            $loginMsg = "Incorrect username or password, please try again.";
            //echo "Incorrect username or password, please try again. <a href='$base_url/login'>Go back</a>";            
            //exit;
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user['status'] == 0){
                $loginMsg = "Account has been deactivated, please contact Administrator.";
            } elseif ((strcmp($user['password'], $hashed_pwd) != 0) && $user['login_attempt'] >= 2){ //wrong password and incorrect login attempt is (*limit*-1)
                setLoginAttemptCounter($db, $user['user_id'], 0);
                deactivateUserAccount($db, $user['user_id']);
                $loginMsg = "Account has been deactivated, please contact Administrator.";
            } elseif (strcmp($user['password'], $hashed_pwd) != 0){
                $newLoginAttemptCount = $user['login_attempt'] + 1;
                setLoginAttemptCounter($db, $user['user_id'], $newLoginAttemptCount);
                $loginMsg = "Incorrect username or password, please try again.";
            } elseif (!checkPasswordExpiryDate($user['passwd_expdate'])){                        
                $loginMsg = "Password has expired, please contact Administrator.";
            } else {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
                $_SESSION['user_browser'] = $_SERVER['HTTP_USER_AGENT'];
                //print_r($_SESSION);
                if ($user['login_attempt'] > 0)
                    setLoginAttemptCounter($db, $user['user_id'], 0);

                header("Location: $base_url");
                exit;
            }
        }
    }
    catch (PDOException $e){
        echo "Failed to login";
    }
}

function checkPasswordExpiryDate($passwordExpiryDate){
    $isValid = false;

    $time = strtotime($passwordExpiryDate);
    $curtime = time();

    if (($time - $curtime) > 0) $isValid = true;

    return $isValid;
}

function setLoginAttemptCounter($dbase, $theUserId, $theLoginAttempt){
    try {
        $stmt = $dbase->prepare("UPDATE user SET login_attempt = :loginAttempt WHERE user_id = :userId");

        $stmt->bindParam(':userId', $theUserId, PDO::PARAM_INT);
        $stmt->bindParam(':loginAttempt', $theLoginAttempt, PDO::PARAM_INT);

        $stmt->execute();
    }
    catch (PDOException $e){
        echo "Failed to add login attempt.";
    }
}

function deactivateUserAccount($dbase, $theUserId){
    try {
        $stmt = $dbase->prepare("UPDATE user SET status = 0 WHERE user_id = :userId");

        $stmt->bindParam(':userId', $theUserId, PDO::PARAM_INT);

        $stmt->execute();
    }
    catch (PDOException $e){
        echo "Failed to deactivate user account.";
    }
}