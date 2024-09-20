<?php
// enroll.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$cours_id = $_POST['cours_id'];

// Inscrire l'utilisateur au cours
$stmt = $conn->prepare("INSERT INTO enrollments (user_id, cours_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $cours_id);

if ($stmt->execute()) {
    echo "Inscription au cours réussie !";
} else {
    echo "Erreur lors de l'inscription au cours. Veuillez réessayer.";
}

$stmt->close();
$conn->close();
?>
