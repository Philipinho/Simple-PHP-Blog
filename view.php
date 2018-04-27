
<?php
include("header.php");
include("connect.php");



$id = (INT) htmlspecialchars(htmlentities($_GET['id']));
 if($id < 1) {
header("location: index.php");
 } 

 $sql = "SELECT id, title, description, date FROM blog WHERE id = '$id'";
 mysqli_select_db($dbcon,'newblog');
 
 $result = mysqli_query($dbcon, $sql);
 
  $invalid = mysqli_num_rows($result);
  if($invalid == 0) {
  header("location: index.php");
  } 
 
 $row = mysqli_fetch_assoc($result);
 
 $id = $row['id'];
 $title = $row['title'];
$des = $row['description'];
$time = $row['date'];

echo '<div class="w3-container w3-sand w3-card-4">';

echo "<h2>$title</h2>";
echo '<div class="w3-panel w3-pale green w3-card-4">';
echo "$des<br>";
echo '<div class="w3-text-grey">';
echo "$time</div>";

?>



 <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id'];?>">[Edit]</a></div>
<div class="w3-text-red">
<a href="del.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div> 



<?php

echo '</div></div>';


include("footer.php"); ?> 