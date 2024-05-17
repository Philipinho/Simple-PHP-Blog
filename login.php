<?php
require_once 'connect.php';
require_once 'header.php';
echo '<h2 class="w3-container w3-teal">Login</h2>';
if (isset($_POST['log'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($dbcon, $sql);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("location: admin.php");
            exit;
        }
    }
    echo "<div class='w3-panel w3-pale-red w3-display-container'>Incorrect username or password.</div>";
}
?>

<form action="" method="POST" class="w3-container w3-padding">
    <label>Username</label>
    <input type="text" name="username" value="<?=isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" class="w3-input w3-border">
    <label>Password</label>
    <input type="password" name="password" class="w3-input w3-border">
    <p><input type="submit" name="log" value="Login" class="w3-btn w3-teal"></p>
</form>

<?php
include ("footer.php");
?>
