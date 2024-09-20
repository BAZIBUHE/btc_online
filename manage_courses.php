<?php
// manage_courses.php

require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch courses for management
$query = "SELECT * FROM courses";
$result = $conn->query($query);
$courses = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
< lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Cours - BTC Plateforme d'Apprentissage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BTC Plateforme</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Accueil</a></li>
                <li class="nav-item active"><a class="nav-link" href="manage_courses.php">Gérer les Cours</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Gérer les Cours</h2>
        <a href="add_course.php" class="btn btn-success mb-3">Ajouter un Nouveau Cours</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($course['title']); ?></td>
                        <td><?php echo htmlspecialchars($course['description']); ?></td>
                        <td>
                            <a href="edit_course.php?id=<?php echo $course['id']; ?>" class="btn btn-warning">Modifier</a>
                            <a href="delete_course.php?id=<?php echo $course['id']; ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Liste des cours -->
    <table>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        <!-- Boucle pour afficher les cours -->
        <?php
        // Code pour récupérer et afficher les cours
        ?>
    </table>
</body>
</html>
