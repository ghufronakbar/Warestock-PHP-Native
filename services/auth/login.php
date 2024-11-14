<?php
session_start();
require_once '../../utils/db.php'; 

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {    
    $_SESSION['username'] = $username;
    header("Location: ../../product.php");
} else {
    header("Location: ../../login.php?error=LoginError");
}

$stmt->close();
$conn->close();
exit();

