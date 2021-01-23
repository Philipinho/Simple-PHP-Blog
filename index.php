<?php
include("header.php");
?>

<div class="w3-panel">
    <p>This is a simple blog project for my PHP development skills.</p>
</div>

<?php
// COUNT 
$posts = file_get_contents("/Users/mac/Desktop/Projects/Simple-PHP-Blog/db/posts.json");
$jsonPosts = json_decode($posts, true);
$numrows = count($jsonPosts['posts']);

if ($numrows < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Nothing to display</div>';
}
foreach ($jsonPosts['posts'] as $post) {
    $id = htmlentities($post['id']);
    $title = htmlentities($post['title']);
    $des = htmlentities($post['description']);
    $time = htmlentities($post['date']);

    echo '<div class="w3-panel w3-sand w3-card-4">';
    echo "<h3><a href='view.php?id=$id'>$title</a></h3><p>";

    echo substr($des, 0, 100);

    echo '</p><div class="w3-text-teal">';
    echo "<a href='view.php?id=$id'>Read more...</a>";

    echo '</div> <div class="w3-text-grey">';
    echo "$time</div>";
    echo '</div>';
}
include("footer.php");
