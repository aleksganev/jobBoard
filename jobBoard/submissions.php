<?php
include_once('header.php');
?>
<main>
    <ul class="submissions-listing">
        <?php
        require("./includes/dbh.inc.php");

        //Gets all the offers from the database

        $query = "SELECT * FROM submitted_offers ORDER BY job_id DESC";

        $result = mysqli_query($conn, $query);

        //Pagination
        $results_per_page = 4;
        $number_of_offers = mysqli_num_rows($result);
        $number_of_pages = ceil($number_of_offers / $results_per_page);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $starting_limit_number = ($page - 1) * $results_per_page;

        //Gets only the needed offers for the current page
        $query = "SELECT * FROM submitted_offers ORDER BY job_id DESC LIMIT "
            . $starting_limit_number . ' , ' . $results_per_page;

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $submissions_array[] = $row;
        }

        //Creates a job-card for each offer
        if (!empty($submissions_array)) {
            foreach ($submissions_array as $key => $value) {
        ?>
                <li class="job-card">
                    <div class="job-primary">
                        <h2 class="job-title"><a href="./submissioninfo.php?offerid=<?php echo $submissions_array[$key]["job_id"]; ?>"><?php echo $submissions_array[$key]["job_title"]; ?></a></h2>
                        <div class="job-meta">
                            <a class="meta-company" href="./submissioninfo.php?offerid=<?php echo $submissions_array[$key]["job_id"]; ?>"><?php echo $submissions_array[$key]["job_company"]; ?></a>
                            <span class="meta-date"><?php echo "Posted on: " . substr($submissions_array[$key]["job_date"], 0, -3); ?></span>
                        </div>
                        <div class="job-details">
                            <span class="job-salary"><?php echo $submissions_array[$key]["job_salary"]; ?> BGN</span>
                        </div>
                    </div>
                    <div class="job-logo">
                        <div class="job-logo-box">
                            <img src="<?php echo $submissions_array[$key]["job_img"]; ?>" alt="">
                        </div>
                    </div>
                    <div class="sub-button-div">
                        <a class="submission-edit button-link" href="./editsubm.php?offerid=<?php echo $submissions_array[$key]["job_id"]; ?>">Edit</a>
                        <a class="submission-approve button-link" href="./includes/approve.inc.php?offerid=<?php echo $submissions_array[$key]["job_id"]; ?>">Approve</a>
                        <a class="submission-reject button-link" href="./includes/deletesubm.inc.php?offerid=<?php echo $submissions_array[$key]["job_id"]; ?>">Reject</a>
                    </div>
                </li>
            <?php
            }
        } else {
            ?>
            <h2 class="no-submissions">No Submissions Available</h2>
        <?php
        }
        ?>
    </ul>
    <div class="page-numbers">
        <?php
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<a href="submissions.php?page=' . $page . '">' . $page . '</a> ';
        }
        ?>
    </div>
</main>
<?php
include_once('footer.php');
?>