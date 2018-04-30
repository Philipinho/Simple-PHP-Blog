
<?php
include("connect.php");

 $sql = "CREATE TABLE blog (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR(80) NOT NULL, description TEXT NOT NULL, date TIMESTAMP NOT NULL)";

if(mysqli_query($dbcon, $sql)) {
	
echo "Database created successfully.";
}
else {	
echo "Failed to create database.";
 }
mysqli_close($dbcon);

?>
    