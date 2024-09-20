<?php

include 'config.php';
// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérification si l'utilisateur est un administrateur
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

echo "<h2>Tableau de Bord de l'Administrateur</h2>";
echo "<p>Bienvenue, " . htmlspecialchars($_SESSION['user_name']) . "!</p>";
echo "<ul>";
echo "<li><a href='manage_courses.php'>Gérer les Cours</a></li>";
echo "<li><a href='manage_users.php'>Gérer les Utilisateurs</a></li>";
echo "<li><a href='manage_payments.php'>Gérer les Paiements</a></li>";
echo "<li><a href='logout.php'>Déconnexion</a></li>";
echo "</ul>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenue dans le tableau de bord Admin</h1>
    <a href="manage_courses.php">Gérer les Cours</a> |
    <a href="manage_users.php">Gérer les Utilisateurs</a> |
    <a href="manage_payments.php">Gérer les Paiements</a> |
    <a href="logout.php">Déconnexion</a>
    <form action="add_advertisement.php" method="POST" enctype="multipart/form-data">
    <label for="course_id">Cours :</label>
    <select name="course_id" required>
        <!-- Remplissez les options avec les cours disponibles -->
        <?php
        $query = "SELECT id, title FROM courses";
        $result = $conn->query($query);
        while ($course = $result->fetch_assoc()) {
            echo "<option value='" . $course['id'] . "'>" . htmlspecialchars($course['title']) . "</option>";
        }
        ?>
    </select>
    
    <label for="banner_image">Image de la Bannière :</label>
    <input type="file" name="banner_image" required>
    
    <label for="redirect_url">URL de Redirection :</label>
    <input type="text" name="redirect_url" required>
    
    <button type="submit">Ajouter la Publicité</button>
</form>

</body>
</html>
