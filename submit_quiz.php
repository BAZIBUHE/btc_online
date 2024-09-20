<?php
// submit_quiz.php

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config.php';

$user_id = $_SESSION['user_id'];
$quiz_id = $_POST['quiz_id'];
$score = 0;

// Calculer le score de l'utilisateur
foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $question_id = str_replace('question_', '', $key);
        $answer_id = $value;

        // Vérifier si la réponse est correcte
        $result = mysqli_query($conn, "SELECT * FROM answers WHERE id = $answer_id AND correct = 1");
        if (mysqli_num_rows($result) > 0) {
            $score++;
        }
    }
}

// Enregistrer le résultat dans la base de données
mysqli_query($conn, "INSERT INTO results (user_id, quiz_id, score) VALUES ($user_id, $quiz_id, $score)");

// Générer un certificat si le score est suffisant
if ($score >= 5) {
    echo "Félicitations ! Vous avez réussi le quiz.";
    // Logique pour générer et télécharger un certificat PDF
} else {
    echo "Désolé, vous n'avez pas réussi le quiz.";
}

?>
