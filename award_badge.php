<?php
// award_badge.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

$user_id = $_POST['user_id'];
$badge_id = $_POST['badge_id'];

// Vérifier si l'utilisateur existe
$user_exists = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
if (mysqli_num_rows($user_exists) > 0) {
    // Attribuer le badge à l'utilisateur
    mysqli_query($conn, "INSERT INTO user_badges (user_id, badge_id, date_attribuee) VALUES ($user_id, $badge_id, NOW())");
    echo "Badge attribué avec succès.";
} else {
    echo "Utilisateur non trouvé.";
}
?>
