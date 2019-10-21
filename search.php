<?php
include("header.php");
include("connect.php");

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($dbcon, $_GET['q']);

    $sql = "SELECT * FROM posts WHERE title LIKE '%{$q}%' OR description LIKE '%{$q}%'";
    $result = mysqli_query($dbcon, $sql);
    if (mysqli_num_rows($result) < 1) {
        echo "Nothing found.";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $des = $row['description'];
        $time = $r['date'];

        echo '<div class="w3-panel w3-sand w3-card-4">';
        echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>";

        echo substr($des, 0, 100);

        echo '</p><div class="w3-text-teal">';
        echo "<a href='view.php?id=$id'>Read more...</a>";

        echo '</div> <div class="w3-text-grey">';
        echo "$time</div>";
        echo '</div>';

    }
}
include("footer.php"); 
