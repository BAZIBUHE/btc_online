<?php
// payment.php

require_once 'config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$course_id = $_GET['course_id'] ?? 0;

// Simulate payment processing (replace with actual API calls)
$payment_method = $_POST['moyen_paiement'] ?? '';
$amount = 100; // Example course amount

if ($payment_method === 'Airtel Money' || $payment_method === 'M-Pesa') {
    // Simulate a successful payment
    $payment_success = true;

    if ($payment_success) {
        // Record the transaction
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO payments (user_id, course_id, amount, status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $status = 'success';
        $stmt->bind_param("iids", $user_id, $course_id, $amount, $status);

        if ($stmt->execute()) {
            echo "Paiement réussi. Vous êtes maintenant inscrit au cours.";
        } else {
            echo "Erreur lors de l'enregistrement du paiement.";
        }
    } else {
        echo "Le paiement a échoué. Veuillez réessayer.";
    }
} else {
    echo "Méthode de paiement non autorisée.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Effectuer un Paiement</h1>
    <form action="payment.php" method="post">
        <label>Montant:</label>
        <input type="number" name="montant" step="0.01" required><br>
        <label>Moyen de paiement:</label>
        <select name="moyen_paiement" required>
            <option value="Airtel Money">Airtel Money</option>
            <option value="M-Pesa">M-Pesa</option>
            <option value="TMB">TMB</option>
            <option value="Orange Money">Orange Money</option>
            <option value="Carte Bancaire">Carte Bancaire</option>
            <option value="MoneyGram">MoneyGram</option>
        </select><br>
        <label>ID du Cours:</label>
        <input type="number" name="cours_id" required><br>
        <button type="submit">Payer</button>
    </form>
</body>
</html>
