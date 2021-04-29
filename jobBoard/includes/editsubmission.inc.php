<?php
function editSubmission($job_id)
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
            $url = $_SERVER["REQUEST_URI"] . "&error=invalidsalary";
            header("location: $url");
            exit();
        }

        if (emptyInputOffer($job_title, $job_desc, $job_company, $job_salary) !== false) {
            $url = $_SERVER["REQUEST_URI"] . "&error=emptyinput";
            header("location: $url");
            exit();
        }

        if (inputTooLong($job_title, $job_desc, $job_company, $job_salary) !== false) {
            $url = $_SERVER["REQUEST_URI"] . "&error=inputtoolong";
            header("location: $url");
            exit();
        }

        if (empty($job_img)) {
            $job_img = "https://blog.nscsports.org/wp-content/uploads/2014/10/default-img.gif";
        }

        //Updates the offer with the new values
        $query = "UPDATE submitted_offers SET job_title='$job_title', job_desc='$job_desc', job_img='$job_img', job_company='$job_company', 
        job_salary='$job_salary', job_date=NOW() WHERE job_id='$job_id'";

        mysqli_query($conn, $query);

        header("Location: ./submissions.php");
        exit();
    }
}
