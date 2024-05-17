<?php
ob_start();
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "newblog";
$charset = "utf8";
$dbcon = mysqli_connect($host, $user, $password, $database);
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($dbcon, $charset);
