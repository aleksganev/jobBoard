<?php
if (isset($_GET["offerid"])) {
    require('./dbh.inc.php');

    $job_id = $_GET["offerid"];

    //Deletes an offer by id from the database
    $query = "DELETE FROM submitted_offers WHERE job_id='$job_id'";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("location: ../submissions.php");
    exit();
}
