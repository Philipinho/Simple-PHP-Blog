<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	} 
 include("header.php");
include("connect.php");
$id = (INT) $_GET['id'];

echo '<div class="w3-container w3-teal">
<h2>New  Post</h2></div>';

if(isset($_POST['submit'])) {
$id = $_POST['id'];
$title = mysqli_real_escape_string($dbcon, $_POST['title']);
$description = mysqli_real_escape_string($dbcon, $_POST ['description']); 
$date = date('Y-m-d H:i');
$posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

$sql = "INSERT INTO posts (id, title, description, posted_by, date) VALUES('$id', '$title', '$description', '$posted_by', '$date')";
mysqli_query($dbcon, $sql) or die("failed to post". mysqli_connect_error());

  printf("Posted successfully. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>", mysqli_insert_id($dbcon));
	
	
	}
else {
	?>
		

<form class="w3-container" action="<?php htmlspecialchars($_SERVER['PHP_SELF'];?>" method="POST">
<label>Title</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Description</label>
<textarea id = "mytextareaj" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>
		
	<?php
	} 
include("footer.php");
?>
    
