<?php
session_start();
include("header.php");
include("security.php");

echo '<div class="w3-container w3-teal">
<h2>New  Post</h2></div>';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST ['description'];
    $date = date('Y-m-d H:i');
    $posted_by = $_SESSION['username'];
    $posts = file_get_contents("/Users/mac/Desktop/Projects/Simple-PHP-Blog/db/posts.json");
    $jsonPosts = json_decode($posts, true);
    $numrows = count($jsonPosts['posts']);
    array_push($jsonPosts['posts'], [
        "id"=>$numrows+1,
        "title"=>$title,
        "description"=>$description,
        "date"=>$date,
        "posted_by"=>$posted_by
    ]);
    $outputJson = json_encode($jsonPosts);
    file_put_contents("/Users/mac/Desktop/Projects/Simple-PHP-Blog/db/posts.json", $outputJson);
    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=view.php?id=%d'/>",$numrows + 1);


} else {

    echo '
<form class="w3-container" method="POST">
<label>Title</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Description</label>
<textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>
';

}

include("footer.php");   
