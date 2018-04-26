
<?php
include('connect.php');

$sql = "CREATE TABLE blog ('id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(80) NOT NULL, description text NOT NULL, date TIMESTAMP')";
$result = mysqli_query($dbcon, $sql);
if(!$result) {
  die("failed to create database". mysqli_connect_error());
}
else {
  echo "Database created succesfully";
}
 mysqli_close($dbcon);

?>
