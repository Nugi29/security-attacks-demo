<?php
//Insecure: hardcoded credentials, no hashing, no brute force protection
$valid_username = "admin";
$valid_password = "12345";

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $valid_username && $password === $valid_password) {
    echo "<h3>Welcome $username</h3>";
} else {
    echo "<h3>Invalid Login</h3>";
}
?>
