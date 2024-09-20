<?php
// publications.php

require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle new publication submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $insert_query = "INSERT INTO publications (user_id, content) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("is", $user_id, $content);
    $insert_stmt->execute();
    header("Location: publications.php"); // Redirect to avoid resubmission
}

// Fetch all publications
$query = "SELECT publications.*, users.user_name FROM publications JOIN users ON publications.user_id = users.id ORDER BY created_at DESC";
$result = $conn->query($query);
$publications = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications - BTC Plateforme d'Apprentissage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BTC Plateforme</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Accueil</a></li>
                <li class="nav-item active"><a class="nav-link" href="publications.php">Publications</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Publications</h2>
        <form action="publications.php" method="POST" class="mb-3">
            <div class="form-group">
                <textarea name="content" class="form-control" placeholder="Quoi de neuf?" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form>

        <h3>Fil de Publications</h3>
        <ul class="list-group">
            <?php foreach ($publications as $publication): ?>
                <li class="list-group-item">
                    <strong><?php echo htmlspecialchars($publication['user_name']); ?></strong>
                    <p><?php echo htmlspecialchars($publication['content']); ?></p>
                    <small class="text-muted"><?php echo htmlspecialchars($publication['created_at']); ?></small>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

