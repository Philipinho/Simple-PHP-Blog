<?php include("header.php");
include("connect.php");
?>

<div class="w3-container w3-teal">
<h2>New  Post</h2>
</div>



<form class="w3-container" action="<?php $_PHP_SELF ?>" method="POST">
<label>Title</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Description</label>
<textarea row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>
<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>



<?php
include("connect.php");

if(isset($_POST['submit'])) {

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$date = date('Y-m-d H:i');


$sql = "INSERT INTO blog (id, title, description, date) VALUES('$id', '$title', '$description', '$date')";
mysqli_select_db($dbcon,'newblog');

$query = mysqli_query($dbcon, $sql);
if (!query) {
die("Failed to post". mysqli_connect_error());
}
else {
echo "<script>alert('Posted successfully')</script>";
}
}


include("footer.php");
?>