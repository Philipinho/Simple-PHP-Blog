<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}
		include("connect.php");
		include("header.php");
?>
<div class="w3-container w3-teal">Admin dashboard</div>
<div class="w3-container">
<p>Welcome <?php echo $_SESSION['username']; ?></p>
<a href="new.php">Create new post</a>
<p><a href="logout.php">Logout</a></p>
</div>
<h5 class="w3-center">Posts</h5>
<?php
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 5;
$totalpages = ceil($numrows / $rowsperpage);
if(isset($_GET['page']) && is_numeric($_GET['page'])) {
	$page = (INT) $_GET['page'];
	} 
	if($page > $totalpages) {
		$page = $totalpages;
		} 
		if($page < 1) {
			$page = 1;
			}
			$offset = ($page - 1) * $rowsperpage;
 
$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if(mysqli_num_rows($result) < 1) {
	echo "No post found";
	} 
	echo "<table class='w3-table-all'>";
echo "<tr class='w3-teal w3-hover-green'>";
echo "<th>ID</th>";
echo "<th>Title</th>";
echo "<th>Posted by</th>";
echo "<th>Date</th>";
echo "<th>Views</th>";
echo "</tr>";
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$title = $row['title'];
        $by = $row['posted_by'];
        $time = $row['date'];
        $hits = $row['hits'];    
      ?>

<tr>
	<td><?php echo $id;?></td>
<td><a href="view.php?id=<?php echo $id;?>"><?php echo $title;?></a></td>
<td><?php echo $by;?></td>
<td><?php echo $time;?></td>
<td><?php echo $hits;?></td>
</tr>

<?php 
} 
echo "</table>";
// pagination 
echo "<div class='w3-bar w3-center'>";
if($page > 1) {
	echo "<a href='?page=1' class='w3-btn'><<</a>";
	$prevpage = $page - 1;
	echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
	}
$range = 3;
for($i = ($page - $range);$i < ($page + $range) + 1;$i++) {
	if(($i > 0) && ($i <= $totalpages)) {
		if($i == $page) {
			echo "<div class='w3-btn w3-teal w3-hover-green'> $i</div>";
			} 
			else {
				echo "<a href='?page=$i' class='w3-btn w3-border'>$i</a>";
				} 
				} 
	} 
	if($page != $totalpages) {
		$nextpage = $page + 1;
echo "<a href='?page=$nextpage' class='w3-btn'>></a>";
		echo "<a href='?page=$totalpages' class='w3-btn'>>></a>";
}
echo "</div>";
	
include("footer.php");
?>