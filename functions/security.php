<?php

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
