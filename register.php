<?php
// register.php
require_once 'config.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $photo = $_FILES['photo']['name'];

    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $photo);

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe, photo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nom, $email, $mot_de_passe, $photo);

    if ($stmt->execute()) {
        echo "Inscription réussie";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Formulaire d'inscription -->
<form method="post" enctype="multipart/form-data">
    <label>Nom:</label>
    <input type="text" name="nom" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Mot de passe:</label>
    <input type="password" name="mot_de_passe" required><br>
    <label>Photo de profil:</label>
    <input type="file" name="photo" required><br>
    <button type="submit">S'inscrire</button>
</form>
