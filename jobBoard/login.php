<?php
include_once('./header.php');
?>

<main class="login-main">
    <form class="login-form" action="./includes/login.inc.php" method="post">
        <h2>Log in</h2>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            if ($error == "emptyinput") {
                echo '<p class="error-message">Fields cannot be empty!</p>';
            } else if ($error == "wronglogin") {
                echo '<p class="error-message">Incorrect login information</p>';
            } else if ($error == "signupsuccess") {
                echo '<p class="error-message">Signup successful! Please log in!</p>';
            }
        }
        ?>
        <input type="text" name="uid" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit">Log in</button>
    </form>

</main>

<?php
include_once('./footer.php');
?>