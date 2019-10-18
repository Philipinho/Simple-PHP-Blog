<?php
session_start();
include("header.php");
include("connect.php");
include("security.php");

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];

if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);

    $sql2 = "UPDATE posts SET title = '$title', description = '$description' WHERE id = $id";

    if (mysqli_query($dbcon, $sql2)) {
        echo "Post edited successfully.";
        echo "<meta http-equiv='refresh' content='2; url=view.php?id=$id' />";

    } else {
        echo "failed to edit." . mysqli_connect_error();
    }
}
?>

    <form action="" method="POST" class="w3-container">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Title</label>
        <input type="text" class="w3-input w3-border" name="title" value="<?php echo $title; ?>">

        <label>Description</label>
        <textarea class="w3-input w3-border" id="description" name="description"><?php echo $description; ?> </textarea>

        <input type="submit" class="w3-btn w3-teal w3-round" name="upd" value="Edit">
    </form>


<?php

mysqli_close($dbcon);
include("footer.php");