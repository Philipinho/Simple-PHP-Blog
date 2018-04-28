<?php include("header.php");
// include("connect.php");
?>

<div class="w3-panel">
<p>This is a simple blog project for my PHP development skills.</p>
</div>

<?php
include("connect.php");


$sql = "SELECT id, title, description, date FROM blog ORDER by id DESC";

mysqli_select_db($dbcon,'newblog');
$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) < 1) {
echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Nothing to display</div>';
}
while ($row = mysqli_fetch_assoc($result)) {

$id = htmlentities($row['id']);
$title = htmlentities($row['title']);
$des = htmlentities($row['description']);
$time = htmlentities($row['date']);

echo '<div class="w3-panel w3-sand w3-card-4">';
echo "<h3><a href='view.php?id=$id'>$title</a></h3>";
echo substr($des,0, 30);
echo '<div class="w3-text-teal">';
echo "<a href='view.php?id=$id'>Read more...</a>";

echo '</div> <div class="w3-text-grey">';
echo "$time</div>";
echo '</div>';

}



?>



<?php include("footer.php");?>
