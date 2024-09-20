<?php
// quiz.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

// Assurer que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Récupérer les questions de quiz de la base de données
$quiz_id = $_GET['id'];
$questions = mysqli_query($conn, "SELECT * FROM questions WHERE quiz_id = $quiz_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
    <h2>Quiz</h2>
    <form action="submit_quiz.php" method="post">
        <?php while ($question = mysqli_fetch_assoc($questions)): ?>
            <p><?php echo $question['texte']; ?></p>
            <?php
            $answers = mysqli_query($conn, "SELECT * FROM answers WHERE question_id = " . $question['id']);
            while ($answer = mysqli_fetch_assoc($answers)):
            ?>
                <input type="radio" name="question_<?php echo $question['id']; ?>" value="<?php echo $answer['id']; ?>">
                <?php echo $answer['texte']; ?><br>
            <?php endwhile; ?>
        <?php endwhile; ?>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
