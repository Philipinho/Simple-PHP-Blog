<?php
include("connect.php");
if(isset($_GET['id'])) {
$id = $_GET['id'];
 
$sql = "DELETE FROM blog WHERE id = '$id'";

$result = mysqli_query($dbcon, $sql);
if($result) {
header('location: index.php');
}
else {
	echo "Failed to delete.".mysqli_connect_error();
}
}
mysqli_close($dbcon);
?>
