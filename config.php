<?php
$conn = new mysqli("localhost", "your_user", "your_pass", "samp_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>