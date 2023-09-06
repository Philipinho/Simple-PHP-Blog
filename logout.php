<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
} else {
    session_destroy();
    header("location: index.php");
}
