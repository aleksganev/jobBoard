<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require('./dbh.inc.php');
    require('functions.inc.php');

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["user_pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        //Creates a new session with the user credentials
        session_start();
        $_SESSION["userid"] = $uidExists["user_id"];
        $_SESSION["user_uid"] = $uidExists["user_uid"];
        header("location: ../index.php");
        exit();
    }
} else {
    header("location: ../login.php");
    exit();
}
