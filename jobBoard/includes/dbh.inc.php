<?php

$host = "localhost";
$password = "";
$user = "root";
$database = "jobs_board";

//Connect to the database
$conn = mysqli_connect($host, $user, $password, $database);

//If the connection fails, throw an error
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
