<?php


$username = $_GET['username'];
$password = $_GET['password'];

$conn = new mysqli("localhost", "root", "1234", "sec");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Logged in as " . htmlspecialchars($username);
} else {
    echo "Invalid login";
}
