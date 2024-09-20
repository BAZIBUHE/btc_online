<?php
// notifications.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

// Récupérer les notifications de la base de données
$notifications = mysqli_query($conn, "SELECT * FROM notifications WHERE user_id = " . $_SESSION['user_id']);
// notifications.php

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch notifications for the logged-in user
$query = "SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$notifications = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mt-5">
    <h2>Notifications</h2>
    <ul class="list-group">
        <?php foreach ($notifications as $notification): ?>
            <li class="list-group-item">
                <?php echo htmlspecialchars($notification['message']); ?>
                <small class="text-muted"><?php echo htmlspecialchars($notification['created_at']); ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
</head>
<body>
    <h2>Notifications</h2>
    <ul>
        <?php while ($notification = mysqli_fetch_assoc($notifications)): ?>
            <li><?php echo $notification['messages']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
