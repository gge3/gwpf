<?php
$host = "localhost";
$db = "gwpf_db";
$user = "portfolio_user";
$pass = "password_forta_123";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error connexió");
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

header("Location: index.php?sent=1");