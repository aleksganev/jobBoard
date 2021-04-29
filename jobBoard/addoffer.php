<?php
include_once('./header.php');
?>
<main class="add-offer-main">
    <form class="new-offer-form" action="<?php
                                            include_once("./includes/addsubmission.inc.php");
                                            addSubmission();
                                            ?>" method="post">
        <h2>Submit a New Job Offer</h2>
        <h4>Note: Your offer must be approved by a logged in user in order to appear in the "Job Offers" tab.</h4>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            if ($error == "emptyinput") {
                echo '<p class="error-message">Fields cannot be empty!</p>';
            } else if ($error == "invalidsalary") {
                echo '<p class="error-message">Invalid Salary!</p>';
            } else if ($error == "inputtoolong") {
                echo '<p class="error-message">Input too long!</p>';
            }
        }
        ?>
        <p>Title:
            <br />
            <input type="text" name="job_title" placeholder="Example: Java Developer" value="" />
        </p>
        <p>Job Logo URL: (Optional)
            <br />
            <input type="text" name="job_img" placeholder="https://imgur.com/..." value="" />
        </p>
        <p>Desctiption:
            <br />
            <textarea type="text" name="job_desc" rows="6" placeholder="We are looking for a..." value=""></textarea>
        </p>
        <p>Company:
            <br />
            <input type="text" name="job_company" placeholder="Company name..." />
        </p>
        <p style="display: inline">Salary:</p>
        <div class="salary-field">
            <input type="text" name="job_salary" />
            <p> BGN</p>
        </div>
        <p class="add-offer-button">
            <button type="submit" name="submit">Submit</button>
        </p>
    </form>
</main>
<?php
include_once('./footer.php');
?>