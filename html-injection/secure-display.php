<?php
// secure_display.php (safe rendering)

$host = "localhost";
$user = "root";
$pass = "1234";
$db   = "sec";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT content FROM `comments-hi` ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>HTML Injection - Safe Display</title></head>
<body>
  <h2>HTML Injection - Safe Display with htmlspecialchars();</h2>
  <a href="index.html">Back</a>
  <div style="border:1px solid #ccc;padding:10px;margin-top:10px;white-space:pre-line;">
    <?php
    // escape before output - prevents both HTML injection and XSS
    while ($row = $result->fetch_assoc()) {
        echo nl2br(htmlspecialchars($row['content'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) . "<br>\n";
    }
    ?>
  </div>
</body>
</html>

