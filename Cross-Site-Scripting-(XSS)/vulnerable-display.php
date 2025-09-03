<?php

$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "sec";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT content  FROM `comments-cs` ORDER BY id DESC");

?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>XSS - Vulnerable Display</title></head>
<body>
  <h2>XSS - Vulnerable Display</h2>
  <a href="index.html">Back</a>
  <div style="border:1px solid #ccc;padding:10px;margin-top:10px;">
    <?php
    while ($row = $result->fetch_assoc()) {
        echo $row['content'] . "<br>\n";
    }
    ?>
  </div>
</body>
</html>