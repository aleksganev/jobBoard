<?php

//Checks if any field is empty during signup
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat)
{
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        return true;
    }
    return false;
}

//Checks if the username has any invalid symbols 
function invalidUid($username)
{
    if (preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    }
    return false;
}

//Checks if the emailis valid 
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

//Checks if the passwords match
function pwdMatch($pwd, $pwdrepeat)
{
    if ($pwd !== $pwdrepeat) {
        return true;
    }
    return false;
}

//Checks if the username already exists in the database
function uidExists($conn, $username, $email)
{
    $query = "SELECT * FROM users WHERE user_uid = ? OR user_email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_assoc($resultData);
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//Checks if any field is empty during login
function emptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    }
    return false;
}

//Checks if any input is empty during offer creation
function emptyInputOffer($job_title, $job_desc, $job_company, $job_salary)
{
    if (empty($job_title) || empty($job_desc) || empty($job_company) || empty($job_salary)) {
        return true;
    }
    return false;
}

//Checks if any input is too long
function inputTooLong($job_title, $job_desc, $job_company, $job_salary)
{
    if (strlen($job_title) > 40 || strlen($job_desc) > 3000 || strlen($job_company) > 40 || strlen($job_salary) > 10) {
        return true;
    }
    return false;
}
