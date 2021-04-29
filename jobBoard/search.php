<?php
include_once('header.php');
?>
<main>
    <form class="search-form" action="./search.php" method="post">
        <input type="text" name='search' class="search-box" placeholder="Search Offers">
        <button type="submit" name='submit-search' class="search-button">Search</button>
    </form>
    <ul class="jobs-listing">
        <?php
        if (isset($_POST['submit-search'])) {
            require("./includes/dbh.inc.php");

            $search = mysqli_real_escape_string($conn, $_POST['search']);

            //Gets all the offers that match the search query
            $query = "SELECT * FROM approved_offers WHERE job_title LIKE '%$search%' 
                OR job_desc LIKE '%$search%' OR job_company LIKE '%$search%'";

            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $offer_array[] = $row;
            }

            //Creates job-cards for matching offers
            if (!empty($offer_array)) {
                foreach ($offer_array as $key => $value) {
        ?>
                    <li class="job-card">
                        <div class="job-primary">
                            <h2 class="job-title"><a href="./offerinfo.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>"><?php echo $offer_array[$key]["job_title"]; ?></a></h2>
                            <div class="job-meta">
                                <a class="meta-company" href="./offerinfo.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>"><?php echo $offer_array[$key]["job_company"]; ?></a>
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
                <h2 class="no-offers">No Offers Available</h2>
        <?php
            }
        }
        ?>
    </ul>
</main>
<?php
include_once('footer.php');
?>