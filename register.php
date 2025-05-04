<?php
require 'config.php';
require 'mailerconfig.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$token = bin2hex(random_bytes(16));

$stmt = $conn->prepare("INSERT INTO players (username, password, email, verify_token, is_verified) VALUES (?, ?, ?, ?, 0)");
$stmt->bind_param("ssss", $username, $password, $email, $token);
$stmt->execute();

$verifyLink = "https://test.samp.xyz/verify.php?token=$token";

$mail->addAddress($email);
$mail->Subject = "Verify your account";
$mail->Body = "Click to verify: $verifyLink";
$mail->send();

echo "Registration successful! Please check your email.";
?>