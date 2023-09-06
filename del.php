<?php
require_once 'security.php';

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == true) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if ($result) {
        header('location: index.php');
    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}
mysqli_close($dbcon);
