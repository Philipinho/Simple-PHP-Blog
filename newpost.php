<?php
include('header.php');
include('connect.php');

// Protect page
$user = "admin";
$pin = "12345";
if(isset($_POST['access'])) {
  if(sanitize($user) == $user && sanitize($pin) == $pin) {
    echo "<script>alert("Access Granted")</script>";
  }
  else {
    die("Access Denied");
  }
  if(!isset($_POST['user']) && !isset($_POST['pin'])) {
    echo "<form action="" method="POST" class="w3-panel w3-card-4">
    <label>User</label>
    <input type="text" name="user" class="w3-input w3-border" required>
    <label>Pin</label>
    <input type="text" name="pin" class="w3-input w3-border" required>
    <input type="button" name="access" value="Access" class="w3-btn w3-teal w3-round">";
    exit;
  }
}
    echo "<div class="w3-container"><h2>New Post</h2></div>
	echo "<form action="" method="POST" class="w3-container">
	<label>Title</label>
    <input type="text" name="title" class="w3-input w3-border" required>
    <label>Description</label>
    <input type="text" name="description" class="w3-input w3-border" required>
    <input type="button" name="submit" value="Post" class="w3-btn w3-teal w3-round">";
	

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
}
  
  mysqli_close($dbcon);

?>
