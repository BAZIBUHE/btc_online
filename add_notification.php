<?php
// add_notification.php
require 'config.php';

$message = $_POST['message'];
$type = $_POST['type'];

// Ajouter la notification à la base de données
mysqli_query($conn, "INSERT INTO notifications (message, type) VALUES ('$message', '$type')");
header('Location: admin_dashboard.php');
exit();
$query = "SELECT * FROM notifications WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($notification = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>" . htmlspecialchars($notification['message']) . "</li>";
    }
} else {
    echo "<li class='list-group-item'>Aucune notification trouvée.</li>";
}

?>
