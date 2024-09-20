<?php
// manage_users.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.php');

// Vérifier si l'utilisateur est administrateur
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Code pour ajouter, modifier ou supprimer des utilisateurs
}

// Affichage de la liste des utilisateurs avec options de modification et de suppression
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion des Utilisateurs</h1>
    <form action="manage_users.php" method="post">
        <label>Nom:</label>
        <input type="text" name="nom" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Ajouter l'Utilisateur</button>
    </form>
    <hr>
    <!-- Liste des utilisateurs -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <!-- Boucle pour afficher les utilisateurs -->
        <?php
        // Code pour récupérer et afficher les utilisateurs
        ?>
    </table>
</body>
</html>
