<?php
require_once 'connect.php';
require_once 'header.php';

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}

$sql = "SELECT * FROM category WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
}

while ($row = mysqli_fetch_assoc($result)) {
    $post_cat = $row['id'];
    $catname = $row['catname'];
    echo '<div class="w3-container w3-center w3-teal">';
    echo "<h3>" . $catname . "</h3></div>";
}


$sql1 = "SELECT * FROM posts WHERE post_cat = '$post_cat' ORDER BY id DESC";
$res = mysqli_query($dbcon, $sql1);

if (mysqli_num_rows($res) == 0) {
    echo "No post yet";
}

while ($r = mysqli_fetch_assoc($res)) {
    $id = $r['id'];
    $title = $r['title'];
    $des = $r['description'];
    $time = $r['date'];

    echo '<div class="w3-panel w3-sand w3-card-4">';
    echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>";

    if (strlen($des) > 100) {
        echo substr($des, 0, 100) . "...";
    } else {
        echo $des;
    }

    echo '</p><div class="w3-text-teal">';
    echo "<a href='view.php?id=$id'>Read more</a>";

    echo '</div> <div class="w3-text-grey">';
    echo "$time</div>";
    echo '</div>';
}

include("footer.php");