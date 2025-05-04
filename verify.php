<?php
require 'config.php';
$token = $_GET['token'];
$stmt = $conn->prepare("UPDATE players SET is_verified = 1 WHERE verify_token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
echo "Account verified!";
?>