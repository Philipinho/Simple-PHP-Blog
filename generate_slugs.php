<?php
set_time_limit(0);
require_once './connect.php';
require_once './functions.php';
require_once './security.php';

$slug_sql = "ALTER TABLE `posts` ADD `slug` VARCHAR(255) NULL DEFAULT NULL AFTER `description`;";

if(mysqli_query($dbcon, $slug_sql)){
    echo "slug column added successfully.<br/>";
}

$sql = "SELECT * FROM posts WHERE slug IS NULL";

$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "It looks like there is nothing to update.";
    die();
}

echo "Generating slugs.<br/>";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $slug = $row['slug'];

    if (is_null($slug)){
        $new_slug = slug($title);

        $sql2 = "UPDATE posts SET slug = '$new_slug' WHERE id = $id";

        if (mysqli_query($dbcon, $sql2)) {
            $permalink = "p/".$id."/".$new_slug;

            echo "Slug successfully generated for <a href='$permalink'>$title</a><br>" ;
        } else {
            echo "Failed to generate slug for post ID: $id." . mysqli_connect_error();
        }

    }

}

mysqli_close($dbcon);