<?php
require_once 'connect.php';
require_once 'header.php';

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($dbcon, $_GET['q']);

    $sql = "SELECT * FROM posts WHERE title LIKE '%{$q}%' OR description LIKE '%{$q}%'";
    $result = mysqli_query($dbcon, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "Nothing found.";
    } else {

      echo "<div class='w3-container w3-padding'>Showing results for $q</div>";

      while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
        $des = htmlentities(strip_tags($row['description']));
        $slug = htmlentities(strip_tags($row['slug']));
        $time = htmlentities($row['date']);

        $permalink = "p/".$id ."/".$slug;

        echo '<div class="w3-panel w3-sand w3-card-4">';
        echo "<h3><a href='$permalink'>$title</a></h3><p>";

        echo substr($des, 0, 100);

        echo '</p><div class="w3-text-teal">';
        echo "<a href='$permalink'>Read more...</a>";

        echo '</div> <div class="w3-text-grey">';
        echo "$time</div>";
        echo '</div>';

      }

    }
}
include("footer.php");
