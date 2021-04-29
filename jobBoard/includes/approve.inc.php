<?php
if (isset($_GET["offerid"])) {
    require('./dbh.inc.php');
    $job_id = $_GET["offerid"];

    //Get the submission from the submissions table
    $query = ("SELECT * FROM submitted_offers WHERE job_id='$job_id'");

    $result = mysqli_query($conn, $query);

    $offer = mysqli_fetch_assoc($result);

    $job_title = $offer["job_title"];
    $job_desc = $offer["job_desc"];
    $job_company = $offer["job_company"];
    $job_img = $offer["job_img"];
    $job_salary = $offer["job_salary"];

    //Add the offer into the offers table
    $query = "INSERT INTO approved_offers (job_title, job_img, job_desc, job_company,
            job_salary, job_date) VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $job_title,
        $job_img,
        $job_desc,
        $job_company,
        $job_salary
    );

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //Add the submission from the submissions table
    $query = "DELETE FROM submitted_offers WHERE job_id='$job_id'";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header("Location: ../submissions.php");
    exit();
}
