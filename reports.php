<?php
// reports.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

// Assurer que l'utilisateur est un administrateur
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Récupérer les données pour le rapport
$users_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$payments_count = mysqli_query($conn, "SELECT COUNT(*) as total FROM payments");
$course_popularity = mysqli_query($conn, "SELECT courses.titre, COUNT(enrollments.id) as total FROM enrollments JOIN courses ON enrollments.cours_id = courses.id



// ... suite du code reports.php

GROUP BY courses.titre ORDER BY total DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rapports et Statistiques</title>
</head>
<body>
    <h2>Rapports et Statistiques</h2>
    <h3>Utilisateurs Inscrits</h3>
    <?php $total_users = mysqli_fetch_assoc($users_count); ?>
    <p>Total des utilisateurs inscrits : <?php echo $total_users['total']; ?></p>
    
    <h3>Transactions de Paiement</h3>
    <?php $total_payments = mysqli_fetch_assoc($payments_count); ?>
    <p>Total des paiements effectués : <?php echo $total_payments['total']; ?></p>
    
    <h3>Popularité des Cours</h3>
    <table border="1">
        <tr>
            <th>Cours</th>
            <th>Nombre d'inscriptions</th>
        </tr>
        <?php while ($course = mysqli_fetch_assoc($course_popularity)): ?>
        <tr>
            <td><?php echo $course['titre']; ?></td>
            <td><?php echo $course['total']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
