<?php
include_once('header.php');
?>
<main>
	<ul class="jobs-listing">
		<?php
		require("./includes/dbh.inc.php");

		$query = "SELECT * FROM approved_offers ORDER BY job_id DESC";

		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$offer_array[] = $row;
		}

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
					</div>
					<div class="job-logo">
						<div class="job-logo-box">
							<img src="<?php echo $offer_array[$key]["job_img"]; ?>" alt="">
						</div>
					</div>
					<div class="job-edit">
						<a class="edit-edit button-link" href="./editoffer.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>">Edit</a>
						<a class="edit-delete button-link" href="./includes/deleteoffer.inc.php?offerid=<?php echo $offer_array[$key]["job_id"]; ?>">Delete</a>
					</div>
				</li>
			<?php
			}
		} else {
			?>
			<h2 class="no-offers">No Offers Available</h2>
		<?php
		}
		?>
	</ul>
</main>
<?php
include_once('footer.php');
?>