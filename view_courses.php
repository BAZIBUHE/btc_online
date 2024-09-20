<?php
// view_courses.php
require_once 'config.php';

// Vérifier si une session n'est pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Code pour afficher les cours disponibles
echo "<h1>Liste des Cours Disponibles</h1>";
// Ajoutez ici le code pour récupérer et afficher les cours depuis la base de données
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cours Disponibles - BTC Plateforme d'Apprentissage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Cours Disponibles</h2>
        <!-- Code pour afficher les cours ici -->
        <p>Aucun cours disponible pour le moment.</p>
    </div>
</body>
</html>
