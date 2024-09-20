<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('is', $user_id, $status);
    $stmt->execute();
    header("Location: dashboard.php");
    exit();
}
?>
