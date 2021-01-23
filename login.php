<?php
session_start();
Include("header.php");

if (isset($_POST['log'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users = file_get_contents("/Users/mac/Desktop/Projects/Simple-PHP-Blog/db/users.json");
    $json = json_decode($users, true);
    $validUser = 0;
    foreach ($json['users'] as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $validUser = 1;
        }
    }
    if ($validUser == 1) {
        $_SESSION['username'] = $username;
        header("location: index.php");
        die;
    } else {
        echo "incorrect details";
    }
} else {
    ?>
    <div class="w3-container w3-teal">Login</div>
    <form action="" method="POST" class="w3-container">
        <label>Username </label>
        <input type="text" name="username" class="w3-input w3-border">
        <label>Password</label>
        <input type="password" name="password" class="w3-input w3-border">
        <input type="submit" name="log" value="Login" class="w3-btn w3-teal">
    </form>
    <?php
}
Include("footer.php");
