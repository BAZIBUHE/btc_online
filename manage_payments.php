<?php
// manage_payments.php

require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Payment processing logic can go here

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Paiements - BTC Plateforme d'Apprentissage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BTC Plateforme</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Accueil</a></li>
                <li class="nav-item active"><a class="nav-link" href="manage_payments.php">Gérer les Paiements</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Gérer les Paiements</h2>
        <form action="process_payment.php" method="POST">
            <div class="form-group">
                <label for="amount">Montant</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Méthode de Paiement</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="m-pesa">M-Pesa</option>
                    <option value="airtel-money">Airtel Money</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Payer</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

    <h1>Gestion des Paiements</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Utilisateur</th>
            <th>ID Cours</th>
            <th>Montant</th>
            <th>Moyen de paiement</th>
            <th>Date</th>
        </tr>
        <!-- Boucle pour afficher les paiements -->
        <?php
        // Code pour récupérer et afficher les paiements
        ?>
    </table>
</body>
</html>
