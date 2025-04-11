<?php
$conn = new mysqli("localhost", "root", "", "salon");

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirmPassword'];

if ($password !== $confirm) {
    echo "<script>alert('Passwords do not match'); window.history.back();</script>";
    exit;
}

$check = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($check->num_rows > 0) {
    echo "<script>alert('Email already exists'); window.history.back();</script>";
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed')");

echo "<script>alert('Registered successfully'); window.location.href='../index.html';</script>";
?>
