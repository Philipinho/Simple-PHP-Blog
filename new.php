<?php
require_once 'connect.php';
require_once 'header.php';
require_once 'security.php';
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $slug = slug($title);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);
    $sql = "INSERT INTO posts (title, description, slug, posted_by, date) VALUES ('$title', '$description', '$slug', '$posted_by', '$date')";
    if (mysqli_query($dbcon, $sql)) {
        $post_id = mysqli_insert_id($dbcon);
        $permalink = "p/$post_id/$slug";
        echo "Posted successfully. Redirecting...";
        echo "<meta http-equiv='refresh' content='2; url=$permalink'/>";
        exit;
    } else {
        die("Failed to post: " . mysqli_error($dbcon));
    }
} else {
?>
    <div class="w3-container">
        <div class="w3-card-4">
            <div class="w3-container w3-teal">
                <h2>New Post</h2>
            </div>
            <form class="w3-container" method="POST">
                <p>
                    <label>Title</label>
                    <input type="text" class="w3-input w3-border" name="title" required>
                </p>
                <p>
                    <label>Description</label>
                    <textarea id="description" rows="30" cols="50" class="w3-input w3-border" name="description" required></textarea>
                </p>
                <p>
                    <input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
                </p>
            </form>
        </div>
    </div>
    <?php
}
include "footer.php";
?>
