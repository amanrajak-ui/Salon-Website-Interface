<?php
$conn = new mysqli("localhost", "root", "", "salon");

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

$res = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $res->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    echo "<script>alert('Login successful'); window.location.href='../index.html';</script>";
} else {
    echo "<script>alert('Invalid email or password'); window.history.back();</script>";
}
?>
