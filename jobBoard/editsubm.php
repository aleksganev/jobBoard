<?php
include_once('header.php');
?>
<main class="edit-subm-main">
    <?php
    if (isset($_GET["offerid"])) {
        require("./includes/dbh.inc.php");
        $job_id = $_GET["offerid"];
        $query = ("SELECT * FROM submitted_offers WHERE job_id='$job_id'");
        $result = mysqli_query($conn, $query);

        $offer = mysqli_fetch_assoc($result);
    ?>
        <form class="edit-subm-form" action="<?php
                                                require("./includes/editsubmission.inc.php");
                                                editSubmission($job_id);
                                                ?>" method="post">
            <h2>Edit Submission</h2>
            <?php
            if (isset($_GET["error"])) {
                $error = $_GET["error"];
                if ($error == "emptyinput") {
                    echo '<p class="error-message">Fields cannot be empty!</p>';
                } else if ($error == "invalidsalary") {
                    echo '<p class="error-message">Invalid Salary!</p>';
                } else if ($error == "inputtoolong") {
                    echo '<p class="error-message">Imput too long!</p>';
                }
            }
            ?>
            <p>Title:
                <br />
                <input type="text" name="job_title" placeholder="Example: Java Developer" value="<?php echo $offer["job_title"]; ?>" />
            </p>
            <p>Job Logo URL: (Optional)
                <br />
                <input type="text" name="job_img" placeholder="https://imgur.com/..." value="<?php echo $offer["job_img"]; ?>" />
            </p>
            <p>Desctiption:
                <br />
                <textarea type="text" name="job_desc" rows="6"><?php echo $offer["job_desc"]; ?></textarea>
            </p>
            <p>Company:
                <br />
                <input type="text" name="job_company" value="<?php echo $offer["job_company"]; ?>" />
            </p>
            <p style="display: inline">Salary:</p>
            <div class="salary-field">
                <input type="text" name="job_salary" value="<?php echo $offer["job_salary"]; ?>" />
                <p> BGN</p>
            </div>
            <p class="edit-offer-button">
                <button type="submit" name="submit">Edit</button>
            </p>
        </form>
    <?php
    }
    ?>
</main>
<?php
include_once('./footer.php');
?>