<?php
include 'config.php';
// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $points = $_POST['points'];
// Ajouter des points à l'utilisateur
mysqli_query($conn, "INSERT INTO user_points (user_id, points, date_accumulation) VALUES ($user_id, $points, NOW())");
echo "Points ajoutés avec succès.";
    $query = "UPDATE users SET points = points + ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $points, $user_id);

    if ($stmt->execute()) {
        echo "Points ajoutés avec succès.";
    } else {
        echo "Erreur lors de l'ajout des points.";
    }

    $stmt->close();
    $conn->close();
}
?>
