<?php
include_once('header.php');
?>
<main>
    <ul class="amdin-panel">
        <?php
        if (isset($_SESSION["user_uid"])) {
            echo '<li><a href="./submissions.php">View Submissions</a></li>';
            echo '<li><a href="./edit.php">Edit Offers</a></li>';
        } else {
            echo '<li><a href="./login.php">You must be logged in!</a></li>';
        }
        ?>
    </ul>
</main>
<?php
include_once('footer.php');
?>