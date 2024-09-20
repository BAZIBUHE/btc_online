<?php
// Exemple simple de vérification de nouvelles notifications
include('config.php');

// Supposons que les notifications soient stockées dans une table 'notifications'
$sql = "SELECT COUNT(*) AS total FROM notifications WHERE vu = 0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(['new_notifications' => $row['total'] > 0]);
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
