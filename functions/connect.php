<?php
require_once 'config.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == 1) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

ob_start();
session_start();

$dbcon = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon, DB_NAME);
mysqli_set_charset($dbcon, DB_CHARSET);
