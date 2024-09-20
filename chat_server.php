<?php
include 'config.php';
session_start();

if (isset($_POST['message'])) {
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO chat_messages (user_id, message, date) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $user_id, $message);

    if ($stmt->execute()) {
        echo htmlspecialchars($message);
    } else {
        echo "Erreur d'envoi du message.";
    }

    $stmt->close();
    $conn->close();
}
?>
