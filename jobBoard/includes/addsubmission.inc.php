<?php
function addSubmission()
{
    //Checks if submit form is sent
    if (isset($_POST['submit'])) {
        require('./includes/dbh.inc.php');
        require('./includes/functions.inc.php');

        //Sets all the fields
        $job_title = str_replace("'", "\'", trim($_POST['job_title']));
        $job_desc = str_replace("'", "\'", trim($_POST['job_desc']));
        $job_company = str_replace("'", "\'", trim($_POST['job_company']));
        $job_img = str_replace("'", "\'", trim($_POST['job_img']));
        $job_salary = trim($_POST['job_salary']);

        if (!is_numeric($job_salary) || $job_salary <= 0) {
            header("location: ./addoffer.php?error=invalidsalary");
            exit();
        }

        if (emptyInputOffer($job_title, $job_desc, $job_company, $job_salary) !== false) {
            header("location: ./addoffer.php?error=emptyinput");
            exit();
        }

        if (inputTooLong($job_title, $job_desc, $job_company, $job_salary) !== false) {
            header("location: ./addoffer.php?error=inputtoolong");
            exit();
        }

        if (empty($job_img)) {
            $job_img = "https://blog.nscsports.org/wp-content/uploads/2014/10/default-img.gif";
        }

        //Inserts the new offer into the database
        $query = "INSERT INTO submitted_offers (job_title, job_img, job_desc, job_company,
            job_salary, job_date) VALUES (?, ?, ?, ?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param(
            $stmt,
            "sssssi",
            $job_title,
            $job_img,
            $job_desc,
            $job_company,
            $job_salary,
        );

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        mysqli_close($conn);

        header("Location: ./index.php");
        exit();
    }
}
