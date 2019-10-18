<?php
session_start();
include("header.php");
include("connect.php");
$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: index.php");
}

$hsql = "UPDATE posts SET hits = hits +1 WHERE id = '$id'";
mysqli_query($dbcon, $hsql);

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$hits = mysqli_fetch_row($res);

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$hits = $row['hits'];
$time = $row['date'];

echo '<div class="w3-container w3-sand w3-card-4">';

echo "<h3>$title</h3>";
echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-4">';
echo "$des<br>";
echo '<div class="w3-text-grey">';
echo "Posted by: " . $by . "<br>";
echo "Views: " . $hits[0] . "<br>";
echo "$time</div>";

?>


<?php
if (isset($_SESSION['username'])) {
    ?>
    <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';


include("footer.php");
