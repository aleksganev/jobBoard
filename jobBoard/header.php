<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="./css/master.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="site-wrapper">
        <header class="site-header">
            <nav>
                <ul class="header-links">
                    <h1 class="site-title"><a href="./index.php?page=1">Job Offers</a></h1>
                    <?php
                    if (isset($_SESSION["user_uid"])) {
                        echo '<li><a href="./includes/logout.inc.php">Log Out</a></li>';
                        echo '<li><a href="./submissions.php?page=1">Submissions</a></li>';
                        echo '<li><a href="./edit.php">Edit Offers</a></li>';
                    } else {
                        echo '<li><a href="./signup.php">Sign up</a></li>';
                        echo '<li><a href="./login.php">Log in</a></li>';
                    }
                    ?>
                    <li><a href="./addoffer.php">Add Offer</a></li>
                </ul>
            </nav>
        </header>