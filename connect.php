<?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "simpleblog";

$dbcon = mysqli_connect("$host, $dbuser, $dbpass);
if(!$dbcon) {
die("Failed to connect". mysqli_connect_error());
}
mysqli_select_db($dbname);

mysqli_close($dbcon);



// Sanitize function
funtion sanitize($data) {
$data = htmlspecialchars($data);
$data = trim($data);
$data = stripslashes($data);

return $data;
}

 ?>
