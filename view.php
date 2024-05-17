<?php
require_once 'connect.php';
require_once 'header.php';
$id = (int)$_GET['id'];
if ($id < 1 || !is_numeric($id)) {
    header("location: $url_path");
    exit;
}
$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: $url_path");
    exit;
}
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$author = $row['posted_by'];
$time = $row['date'];
echo '<div class="w3-container w3-sand w3-card-4">';
echo "<h3>$title</h3>";
echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-4">';
echo "$description<br>";
echo "<div class='w3-text-grey'>Posted by: $author<br>$time</div>";
if (isset($_SESSION['username'])) {
?>
    <div class="w3-text-green"><a href="<?=$url_path
?>edit.php?id=<?=$id
?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="<?=$url_path
?>del.php?id=<?=$id
?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';
include "footer.php";
?>
