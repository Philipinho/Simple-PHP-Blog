<?php
include('header.php');
include('connect.php');

if(isset($_POST['submit'])) {
  $id = htmlentities(


$sql = "INSERT INTO blog (id, title, description, date) VALUES($id, $title, $description, $date)";

$result = mysqli_query($dbcon, $sql);




?>
