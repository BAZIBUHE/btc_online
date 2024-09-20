<?php
// upload_course.php
require_once 'config.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'professeur') {
    header("Location: dashboard.php");
    exit();
}
// upload_course.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['course_material'];
    $upload_dir = 'uploads/';

    // Vérifiez le type de fichier, la taille et d'autres paramètres de sécurité
    if ($file['size'] < 5000000 && in_array($file['type'], ['application/pdf', 'video/mp4'])) {
        $destination = $upload_dir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            echo "Fichier téléchargé avec succès.";
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Fichier non valide ou trop volumineux.";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];

    $sql = "INSERT INTO cours (titre, description, professeur_id, prix, type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssids', $titre, $description, $_SESSION['utilisateur_id'], $prix, $type);

    if ($stmt->execute()) {
        echo "Cours ajouté avec succès";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Formulaire pour ajouter un cours -->
<form method="post">
    <label>Titre du cours:</label>
    <input type="text" name="titre" required><br>
    <label>Description:</label>
    <textarea name="description" required></textarea><br>
    <label>Prix:</label>
    <input type="number" name="prix" required><br>
    <label>Type:</label>
    <select name="type">
        <option value="en ligne">En ligne</option>
        <option value="en presentiel">En présentiel</option>
    </select><br>
    <button type="submit">Ajouter le cours</button>
</form>
