<?php
include_once('./header.php');
?>
<main>
    <?php
    if (isset($_GET["offerid"])) {

        $job_id = $_GET["offerid"];
        require("./includes/dbh.inc.php");

        //Gets submission by id from the database
        $query = ("SELECT * FROM submitted_offers WHERE job_id='$job_id'");
        $result = mysqli_query($conn, $query);

        $offer = mysqli_fetch_assoc($result);
        //Creates a job-card for the submission
    ?>
        <div class="job-single">
            <main class="job-main">
                <div class="job-card">
                    <div class="job-primary">
                        <header class="job-header">
                            <h2 class="job-title"><a><?php echo $offer["job_title"]; ?></a></h2>
                            <div class="job-meta">
                                <a class="meta-company"><?php echo $offer["job_company"]; ?></a>
                                <span class="meta-date"><?php echo "Posted on: " . substr($offer["job_date"], 0, -3); ?></span>
                            </div>
                        </header>

                        <div class="job-body">
                            <p><?php echo $offer["job_desc"]; ?></p>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="job-secondary">
                <div class="job-logo">
                    <div class="job-logo-box">
                        <img src="<?php echo $offer["job_img"]; ?>" alt="">
                    </div>
                </div>
                <a href="#" class="button button-wide">Apply now</a>
            </aside>
        </div>

        <h2 class="section-heading">Other Submissions:</h2>
        <ul class="jobs-listing">
            <?php
            $query = "SELECT * FROM submitted_offers WHERE job_id!=$job_id ORDER BY job_id DESC";

            $result = mysqli_query($conn, $query);
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $offer_array[] = $row;
                $index++;
                if ($index == 2) {
                    break;
                }
            }

            if (!empty($offer_array)) {
                foreach ($offer_array as $key => $value) {
            ?>
                    <li class="job-card">
                        <div class="job-primary">
                            <h2 class="job-title"><a href="./submissioninfo.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>"><?php echo $offer_array[$key]["job_title"]; ?></a></h2>
                            <div class="job-meta">
                                <a class="meta-company" href="./submissioninfo.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>"><?php echo $offer_array[$key]["job_company"]; ?></a>
                                <span class="meta-date"><?php echo "Posted on: " . substr($offer_array[$key]["job_date"], 0, -3); ?></span>
                            </div>
                            <div class="job-details">
                                <span class="job-salary"><?php echo $offer_array[$key]["job_salary"]; ?> BGN</span>
                            </div>
                        </div>
                        <div class="job-logo">
                            <div class="job-logo-box">
                                <img src="<?php echo $offer_array[$key]["job_img"]; ?>" alt="">
                            </div>
                        </div>
                    </li>
                <?php
                }
            } else {
                ?>
                <h2 class="no-offers">No Submissions Available</h2>
        <?php
            }
        }
        ?>
        </ul>
</main>
<?php
include_once('footer.php');
?>