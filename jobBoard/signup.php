<?php
include_once('./header.php');
?>

<main class="signup-main">
    <form class="signup-form" action="./includes/signup.inc.php" method="post">
        <h2>Sign up</h2>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            if ($error == "emptyinput") {
                echo '<p class="error-message">Fields cannot be empty!</p>';
            } else if ($error == "invaliduid") {
                echo '<p class="error-message">Invalid username! (No special symbols allowed!)</p>';
            } else if ($error == "invalidemail") {
                echo '<p class="error-message">Invalid email!</p>';
            } else if ($error == "passwordsdontmatch") {
                echo '<p  class="error-message">Passwords do not match!</p>';
            } else if ($error == "uidtaken") {
                echo '<p class="error-message">Username or email already taken!</p>';
            } else if ($error == "stmtfailed") {
                echo '<p class="error-message">Something went wrong, try again!</p>';
            } else if ($error == "none") {
                echo '<p class="error-message">Sign up successful!</p>';
            }
        }
        ?>
        <input type="text" name="name" placeholder="Full name...">
        <input type="text" name="uid" placeholder="Username...">
        <input type="text" name="email" placeholder="Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdrepeat" placeholder="Repeat password...">
        <button type="submit" name="submit">Sign up</button>
    </form>

</main>

<?php
include_once('./footer.php');
?>