<?php
session_start();
if(!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();
	}
	?>
		<?php
		include("connect.php");
		include("header.php");
?>
<div class="w3-container w3-teal">Admin dashboard</div>

<div class="w3-container" >
<p>Welcome <?php echo $_SESSION['username']; ?></p>
<a href="new.php">Create new post</a>
<p><a href="logout.php">Logout</a></p>


</div>

	<?php
include("footer.php");
?>