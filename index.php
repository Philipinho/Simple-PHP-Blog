<?php
require_once 'connect.php';
require_once 'header.php';
function escape($string) {
    return htmlentities($string);
}
function getPaginatedPosts($dbcon, $offset, $rowsperpage) {
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
    return mysqli_query($dbcon, $sql);
}
function displayPagination($page, $totalpages) {
    echo "<p><div class='w3-bar w3-center'>";
    if ($page > 1) {
        echo "<a href='?page=1'>&laquo;</a>";
        $prevpage = $page - 1;
        echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
    }
    $range = 5;
    for ($x = $page - $range;$x < ($page + $range) + 1;$x++) {
        if ($x > 0 && $x <= $totalpages) {
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
$sqlCount = "SELECT COUNT(*) FROM posts";
$resultCount = mysqli_query($dbcon, $sqlCount);
$r = mysqli_fetch_row($resultCount);
$numrows = $r[0];
$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, min($page, $totalpages));
$offset = ($page - 1) * $rowsperpage;
$resultPosts = getPaginatedPosts($dbcon, $offset, $rowsperpage);
if (mysqli_num_rows($resultPosts) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No post yet!</div>';
} else {
    while ($row = mysqli_fetch_assoc($resultPosts)) {
        $id = escape($row['id']);
        $title = escape($row['title']);
        $des = escape(substr(strip_tags($row['description']), 0, 100));
        $slug = escape($row['slug']);
        $time = escape($row['date']);
        $permalink = "p/$id/$slug";
        echo '<div class="w3-panel w3-sand w3-card-4">';
        echo "<h3><a href='$permalink'>$title</a></h3><p>$des";
        echo '<div class="w3-text-teal">';
        echo "<a href='$permalink'>Read more...</a></p>";
        echo '</div>';
        echo "<div class='w3-text-grey'> $time </div>";
        echo '</div>';
    }
    displayPagination($page, $totalpages);
}
include "categories.php";
include "footer.php";
?>
