<?php
include('header.php');
include('connect.php');

if(isset($_POST['submit'])) {
  $id = sanitize($_GET['id']);
  $title = sanitize($_POST['title']);
  $description = sanitize($_POST['description']);
  $date = sanitize($_POST['date']);

$sql = "INSERT INTO blog (id, title, description, date) VALUES($id, $title, $description, $date)";

$result = mysqli_query($dbcon, $sql);
  if(!$result) {
    echo "failed to post" . mysqli_connect_error();
  }
  else {
    echo "Posted succesfully";
  }
  
  mysqli_close($dbcon);

?>
