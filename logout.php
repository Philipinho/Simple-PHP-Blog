<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: index.php");
} else {
    session_destroy();
    header("location: login.php");
}
