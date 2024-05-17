<?php
require_once 'connect.php';
require_once 'header.php';
require_once 'security.php';
$id = (int)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
    exit;
}
$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) == 0) {
    header("location: index.php");
    exit;
}
$row = mysqli_fetch_assoc($result);
$permalink = "p/{$row['id']}/{$row['slug']}";
if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $slug = slug(mysqli_real_escape_string($dbcon, $_POST['slug']));
    $sql2 = "UPDATE posts SET title = '$title', description = '$description', slug = '$slug' WHERE id = $id";
    if (mysqli_query($dbcon, $sql2)) {
        echo '<meta http-equiv="refresh" content="0">';
        exit;
    } else {
        echo "Failed to edit." . mysqli_error($dbcon);
    }
}
?>

<div class="w3-container">
    <div class="w3-card-4">
        <div class="w3-container w3-teal">
            <h2>Edit Post - <a href="<?=$permalink
?>">Goto post</a></h2>
        </div>
        <form action="" method="POST" class="w3-container">
            <input type="hidden" name="id" value="<?=$row['id'] ?>">
            <p>
                <label>Title</label>
                <input type="text" class="w3-input w3-border" name="title" value="<?=$row['title'] ?>">
            </p>
            <p>
                <label>Description</label>
                <textarea class="w3-input w3-border" id="description" name="description"><?=$row['description'] ?></textarea>
            </p>
            <p>
                <label>Slug (SEO URL)</label>
                <input type="text" class="w3-input w3-border" name="slug" value="<?=$row['slug'] ?>">
            </p>
            <p>
                <input type="submit" class="w3-btn w3-teal w3-round" name="upd" value="Save post">
            </p>
            <p>
                <div class="w3-text-red">
                    <a href="<?=$url_path ?>del.php?id=<?=$row['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</a>
                </div>
            </p>
        </form>
    </div>
</div>

<?php
mysqli_close($dbcon);
include ("footer.php");
?>
