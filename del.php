<?php
require_once 'connect.php';
require_once 'security.php';
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    if ($result) {
        header('location: index.php');
        exit;
    } else {
        echo "Failed to delete." . mysqli_error($dbcon);
    }
}
mysqli_close($dbcon);
?>
