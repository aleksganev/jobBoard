<?php
//logs the user out
session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();
