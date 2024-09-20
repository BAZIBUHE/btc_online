<?php
// Initialiser le jeton CSRF s'il n'est pas défini
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root"; // Changez selon votre configuration
$password = ""; // Changez selon votre configuration
$dbname = "btcdb";

// Créez une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
echo "Connecté avec succès<br>";

// Testez une requête SQL
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Affichez les données
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nom: " . $row["nom"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>
