<?php
// submit.php

$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "sec";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!empty($_POST['comment'])) {

    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO `comments-hi` (content) VALUES (?)");
    $stmt->bind_param("s", $comment);
    $stmt->execute();
}

// redirect
header("Location: vulnerable-display.php");
exit;
?>
