// FILE IS NOT IN USE
<?php die(); ?>

<?php 
// From generate_slugs.php
$slug_sql = "ALTER TABLE `posts` ADD `slug` VARCHAR(255) NULL DEFAULT NULL AFTER `description`;";

if (mysqli_query($dbcon, $slug_sql)) {
    echo "slug column added successfully.<br/>";
}