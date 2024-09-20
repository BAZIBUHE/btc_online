<?php
// api/payments.php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Pour le développement, à ajuster en production

// Lire la requête JSON
$request = file_get_contents('php://input');
$data = json_decode($request, true);

// Clé API Airtel Money
$apiKey = 'b6bb8244-1fca-484c-b1ad-b8b6e2cc3844';
$apiUrl = 'https://api.airtel.com/v1/payments'; // Remplacez par l'URL correcte de l'API Airtel Money

// Vérifier si les données sont présentes
if (isset($data['amount'])) {
    $amount = $data['amount'];

    // Préparer les données pour l'API Airtel Money
    $postData = json_encode([
        'amount' => $amount,
        // Ajoutez d'autres paramètres requis par l'API ici
    ]);

    // Initialiser cURL
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Exécuter la requête
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Vérifier le code de réponse HTTP
    if ($httpCode == 200) {
        // Décoder la réponse JSON de l'API
        $responseData = json_decode($response, true);
        if (isset($responseData['success']) && $responseData['success']) {
            // Réponse de succès
            echo json_encode(['success' => true, 'message' => 'Paiement réussi']);
        } else {
            // Réponse d'échec de paiement
            echo json_encode(['success' => false, 'message' => 'Erreur lors du paiement']);
        }
    } else {
        // Réponse d'échec de l'API
        echo json_encode(['success' => false, 'message' => 'Erreur de connexion à l\'API']);
    }
} else {
    // Réponse en cas d'erreur
    echo json_encode(['success' => false, 'message' => 'Montant manquant']);
}
