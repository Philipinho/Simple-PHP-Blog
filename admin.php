<?php
require_once 'connect.php';
require_once 'header.php';
require_once 'security.php';
echo '<h2 class="w3-container w3-teal w3-center">Admin Dashboard</h2>';
echo '<div class="w3-container">';
echo '<p>Welcome ' . $_SESSION['username'] . ',</p>';
echo '<p><a href="new.php" class="w3-button w3-teal">Create new post</a></p>';
echo '<p><a href="generate_slugs.php" class="w3-button w3-teal">Generate slugs (SEO URLs)</a></p>';
echo '</div>';
echo '<h5 class="w3-center">Posts</h5>';
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$numrows = mysqli_fetch_row($result) [0];
$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalpages));
$offset = ($page - 1) * $rowsperpage;
$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) < 1) {
    echo 'No post found';
} else {
    echo '<table class="w3-table-all">';
    echo '<tr class="w3-teal w3-hover-green">';
    echo '<th>ID</th><th>Title</th><th>Date</th><th>Actions</th>';
    echo '</tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $slug = $row['slug'];
        $time = $row['date'];
        $permalink = "p/$id/$slug";
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td><a href='$permalink'>" . substr($title, 0, 50) . "</a></td>";
        echo "<td>$time</td>";
        echo "<td><a href='edit.php?id=$id'>Edit</a> | ";
        echo "<a href='del.php?id=$id' onclick='return confirm(\"Are you sure you want to delete this post?\")'>Delete</a></td>";
        echo "</tr>";
    }
    echo '</table>';
    echo '<div class="w3-bar w3-center">';
    if ($page > 1) {
        echo "<a href='?page=1' class='w3-btn'><<</a>";
        $prevpage = $page - 1;
        echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
    }
    $range = 3;
    for ($i = max($page - $range, 1);$i <= min($page + $range, $totalpages);$i++) {
        if ($i == $page) {
            echo "<div class='w3-btn w3-teal w3-hover-green'>$i</div>";
        } else {
            echo "<a href='?page=$i' class='w3-btn w3-border'>$i</a>";
        }
    }
    if ($page < $totalpages) {
        $nextpage = $page + 1;
        echo "<a href='?page=$nextpage' class='w3-btn'>></a>";
        echo "<a href='?page=$totalpages' class='w3-btn'>>></a>";
    }
    echo '</div>';
}
include ("footer.php");
?>
