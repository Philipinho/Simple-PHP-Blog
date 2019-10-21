<?php
  session_start();
  include("connect.php");

  if(!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
  }

  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($dbcon, (int) $_GET['id']);
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);

    if($result) {
      header('location: index.php');
    } else {
      echo "Failed to delete.".mysqli_connect_error();
    }
  }
  mysqli_close($dbcon);
?>

