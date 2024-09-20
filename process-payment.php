<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_method = $_POST['payment_method'];
    $transaction_reference = $_POST['transaction_reference'];

    if (empty($payment_method) || empty($transaction_reference)) {
        http_response_code(400);
        echo 'Informations de paiement manquantes.';
        exit;
    }

    $to = 'contact@btcplatform.com';
    $subject = 'Nouvelle inscription - Confirmation de paiement';
    $message = "Mode de paiement: $payment_method\nRéférence de transaction: $transaction_reference";
    $headers = 'From: your-email@gmail.com' . "\r\n" .
               'Reply-To: your-email@gmail.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'Votre paiement a été enregistré avec succès. Merci !';
    } else {
        http_response_code(500);
        echo 'Erreur lors de l\'envoi de l\'e-mail.';
    }
} else {
    http_response_code(405);
    echo 'Méthode non autorisée.';
}
?>
