<div class="w3-container w3-center w3-teal"><h3>Categories</h3></div>
<?php
$sql = "SELECT * FROM category";
$result = mysqli_query($dbcon, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<div class='w3-container w3-border'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $catname = $row['catname'];
        $description = $row['description'];
?>
        <div class="w3-panel w3-border"><a href="cat.php?id=<?=$id; ?>"><?=$catname; ?></a><br>
            <?=$description; ?>
        </div>
<?php
    }
    echo "</div>";
} else {
    echo "<div class='w3-panel w3-pale-red'>No Category found.</div>";
}
?>
