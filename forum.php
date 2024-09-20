<?php
// forum.php

include 'config.php';
// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Afficher tous les sujets du forum
$query = "SELECT * FROM forum_topics ORDER BY date DESC";
$result = $conn->query($query);

echo "<h2>Sujets du Forum</h2>";
while ($topic = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($topic['title']) . "</h3>";
    echo "<p>" . htmlspecialchars($topic['description']) . "</p>";
    echo "</div>";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forum de Discussion</title>
</head>
<body>
    <h2>Forum de Discussion</h2>
    <ul>
        <?php while ($topic = mysqli_fetch_assoc($topics)): ?>
            <li><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['titre']; ?></a> - Posté par <?php echo $topic['auteur']; ?></li>
        <?php endwhile; ?>
    </ul>
    <form action="add_topic.php" method="post">
        <input type="text" name="titre" placeholder="Titre du sujet">
        <textarea name="contenu" placeholder="Votre message"></textarea>
        <button type="submit">Ajouter un Sujet</button>
    </form>
</body>
</html>
