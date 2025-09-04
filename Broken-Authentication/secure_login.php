<?php
//password hashing & safe verification
session_start();

$stored_username = "admin";
$stored_password = '$2y$10$8QlChXddkz0..Q1p6UhGlu7E5O/kx5pM29.ygfWf1c4eXr7pM8eeW';

$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $stored_username && password_verify($password, $stored_password)) {
    $_SESSION['user'] = $username;
    session_regenerate_id(true); // prevent session fixation
    echo "<h3>Welcome $username (Secure)</h3>";
} else {
    echo "<h3>Invalid Login</h3>";
}
?>
