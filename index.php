<?php
require_once 'connect.php';
require_once 'header.php';
?>

<div class="w3-panel">
    <p>This is a simple blog project for my PHP development skills.</p>
</div>

<?php
// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No post yet!</div>';
} else {
  while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    $des = htmlentities(strip_tags($row['description']));
    $slug = htmlentities($row['slug']);
    $time = htmlentities($row['date']);

    $permalink = "p/".$id ."/".$slug;

    echo '<div class="w3-panel w3-sand w3-card-4">';
    echo "<h3><a href='$permalink'>$title</a></h3><p>";

    echo substr($des, 0, 100);

    echo '<div class="w3-text-teal">';
    echo "<a href='$permalink'>Read more...</a></p>";

    echo '</div>';
    echo "<div class='w3-text-grey'> $time </div>";
    echo '</div>';
}


echo "<p><div class='w3-bar w3-center'>";

if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}

$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='w3-teal w3-button'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='w3-button w3-border'>$x</a>";
        }
    }
}

if ($page != $totalpages) {
    $nextpage = $page + 1;
    echo "<a href='?page=$nextpage' class='w3-button'>></a>";
    echo "<a href='?page=$totalpages' class='w3-btn'>&raquo;</a>";
}

echo "</div></p>";
}

include("categories.php");
include("footer.php");
