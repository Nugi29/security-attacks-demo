<?php

$username = $_GET['username'];
$password = $_GET['password'];

$conn = new mysqli("localhost", "root", "1234", "sec");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//directly inserting user input into SQL
$sql = "SELECT * FROM `admin` WHERE name = '$username' AND password = '$password'";
echo $sql;
echo "<br>";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Logged in as " . $username;
} else {
    echo "Invalid login";
}
// to check the injection, try entering ' OR '1'='1 for both username and password fields
?>
