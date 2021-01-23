<?php
session_start();
include("header.php");
$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}

$posts = file_get_contents("/Users/mac/Desktop/Projects/Simple-PHP-Blog/db/posts.json");
$json = json_decode($posts, true);
$postData;
foreach ($json["posts"] as $post) {
    if ($post["id"] == $id) {
        $postData = $post;
    }
}

if ($postData) {
    $id = $postData['id'];
    $title = $postData['title'];
    $des = $postData['description'];
    $by = $postData['posted_by'];
    $time = $postData['date'];
    echo '<div class="w3-container w3-sand w3-card-4">';

    echo "<h3>$title</h3>";
    echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-4">';
    echo "$des<br>";
    echo '<div class="w3-text-grey">';
    echo "Posted by: " . $by . "<br>";
    echo "Views: " . 1 . "<br>";
    echo "$time</div>";
} else {
    echo "Post not found";
}

// $id = $row['id'];
// $title = $row['title'];
// $des = $row['description'];
// $by = $row['posted_by'];
// $hits = $row['hits'];
// $time = $row['date'];

// echo '<div class="w3-container w3-sand w3-card-4">';

// echo "<h3>$title</h3>";
// echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-4">';
// echo "$des<br>";
// echo '<div class="w3-text-grey">';
// echo "Posted by: " . $by . "<br>";
// echo "Views: " . 1 . "<br>";
// echo "$time</div>";

?>


<?php
if (isset($_SESSION['username'])) {
    ?>
    <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';


include("footer.php");
