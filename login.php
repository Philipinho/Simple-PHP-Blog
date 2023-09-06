<?php
require_once 'header.php';

// Set a temporary variable to track if there is a login error (e.g. username / password mismatch or missing in the login request.)
$login_error = false;

# Turn on debug mode, and show all errors.
if (DEBUG_MODE == 1) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

echo '<h2 class="w3-container w3-teal">Login</h2>';

if (isset($_POST['username'])) {$CurrentUser = htmlentities(strip_tags($_POST['username']), ENT_SUBSTITUTE);}

// Lets check to see if the call was a HTTP POST request
//    If it is, display the admin page
//    If it is NOT, display the login page
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Now to check if the username field is not empty, otherwise throw an error.
    if (empty(trim($_POST["username"]))) {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Incorrect username or password.</div>";
    } else {
        // We have data for a username, now lets save it in a SQL safe string (e.g. automatically add escape characters, etc.)
        $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    }

    // Do the same for the password field.
    if (empty(trim($_POST["password"]))) {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Incorrect username or password.</div>";
    } else {
        // And again save the password in a SQL safe string
        $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    }

    // Build the SQL statement to get the user details (so we can then verify the user exists AND that the password is valid)
    $sql = "SELECT 'id', 'username', 'password' FROM users WHERE username = '$username'";
    $sql = "SELECT 'id', 'username', 'password', 'displayname' FROM users WHERE username = '$username'";

    // Request the data from the SQL server, process it AND count the number of rows.
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);
    $row_count = mysqli_num_rows($result);

    // Check that the user only exists once in the SQL database AND that the password is matching.
    if ($row_count == 1 && password_verify($password, $row['password'])) {
        // This part we store some information in the PHP session information, so we can use it as a later time (e.g. the user ID)
        $_SESSION['displayname'] = $row['displayname'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $username;
        $_SESSION["loggedin"] = true;

        // Now we redirect the user to the admin portal.
        header("location: admin.php");
    } else {
        echo "<div class='w3-panel w3-pale-red w3-display-container'>Incorrect username or password.</div>";
    }
}
?>

<form action="" method="POST" class="w3-container w3-padding">
    <label>Username </label>
    <input type="text" name="username" value="<?php if (isset($_POST['username'])) { echo $CurrentUser; } ?>" class="w3-input w3-border">
    <label>Password</label>
    <input type="password" name="password" class="w3-input w3-border">
    <p><input type="submit" name="login" value="Login" class="w3-btn w3-teal"></p>
</form>

<?php

include("footer.php");
