<?php
require_once 'config.php'; // Assurez-vous que ce fichier contient les configurations nécessaires, y compris la connexion à la base de données.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? 'Utilisateur';
$user_image = $_SESSION['user_image'] ?? 'default.jpg'; // Chemin de l'image par défaut si aucune image n'est définie
$email = $_SESSION['email'] ?? 'email@example.com'; // Email par défaut si aucune valeur n'est définie

// Connexion à la base de données
try {
    // Assurez-vous que $pdo est bien défini dans config.php
    if (!isset($pdo)) {
        throw new Exception('Connexion à la base de données non définie.');
    }

    $stmt = $pdo->prepare('SELECT notes_moyennes, pourcentage_cours_termines FROM users WHERE id = :user_id');
    $stmt->execute(['user_id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        throw new Exception('Utilisateur non trouvé.');
    }

} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    $error_message = 'Erreur de connexion à la base de données : ' . $e->getMessage();
    error_log($e->getMessage());
} catch (Exception $e) {
    // Gestion des erreurs générales
    $error_message = $e->getMessage();
    error_log($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - BTC Plateforme d'Apprentissage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BTC Plateforme</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Accueil</a></li>
                <li class="nav-item active"><a class="nav-link" href="profile.php">Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="messages.php">Messages</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Mon Profil</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php else: ?>
            <img src="<?php echo htmlspecialchars($user_image); ?>" alt="Image de Profil" class="img-fluid rounded-circle mb-3">
            <p><strong>Nom:</strong> <?php echo htmlspecialchars($user_name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <a href="edit_profile.php" class="btn btn-primary">Modifier le Profil</a>
        <?php endif; ?>
    </div>

    <div class="container mt-5">
        <h2>Mes Statistiques</h2>
        <?php if (isset($error_message)): ?>
            <p>Impossible de charger les statistiques.</p>
        <?php else: ?>
            <p>Notes moyennes: <?php echo htmlspecialchars($user['notes_moyennes'] ?? 'N/A'); ?></p>
            <p>Pourcentage de cours terminés: <?php echo htmlspecialchars($user['pourcentage_cours_termines'] ?? 'N/A'); ?>%</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
