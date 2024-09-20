<?php
// comments.php

// Afficher les commentaires
$query = "SELECT comments.comment, comments.rating, users.username 
          FROM comments JOIN users ON comments.user_id = users.id
          WHERE comments.course_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

while ($comment = $result->fetch_assoc()) {
    echo "<div class='comment'>";
    echo "<p><strong>" . htmlspecialchars($comment['username']) . ":</strong> " . htmlspecialchars($comment['comment']) . "</p>";
    echo "<p>Note : " . htmlspecialchars($comment['rating']) . "/5</p>";
    echo "</div>";
}

// Ajouter un commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    $query = "INSERT INTO comments (course_id, user_id, comment, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iisi", $course_id, $user_id, $comment, $rating);
    $stmt->execute();
}

?>