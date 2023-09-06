<?php
# Turn on debug mode, and show all errors.
if (DEBUG_MODE == 1) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

session_start();
if (!isset($_SESSION['username'])) {
    header("location: index.php");
} else {
    session_destroy();
    header("location: login.php");
}
