<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "newblog";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon, $dbname);