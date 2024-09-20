<?php
// search.php
// search.php
session_start();
require 'config.php';

$search_query = isset($_GET['query']) ? $_GET['query'] : '';
$search_type = isset($_GET['type']) ? $_GET['type'] : '';

if ($search_query && $search_type) {
    if ($search_type == 'cours') {
        $sql = "SELECT * FROM courses WHERE titre LIKE ? OR description LIKE ?";
    } elseif ($search_type == 'enseignants') {
        $sql = "SELECT * FROM users WHERE role = 'teacher' AND (nom LIKE ? OR prenom LIKE ?)";
    } elseif ($search_type == 'discussions') {
        $sql = "SELECT * FROM topics WHERE titre LIKE ? OR contenu LIKE ?";
    } else {
        echo "<div class='alert alert-info'>Type de recherche non valide.</div>";
        exit();
    }

    $stmt = $conn->prepare($sql);
    $likeQuery = "%" . $search_query . "%";
    $stmt->bind_param("ss", $likeQuery, $likeQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='search-item'>" . htmlspecialchars($row['titre']) . "</div>";
    }
} else {
    echo "<div class='alert alert-info'>Aucun terme de recherche fourni.</div>";
}

?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche Avancée</title>
</head>
<body>
    <h2>Résultats de la Recherche pour "<?php echo $search_query; ?>"</h2>
    <ul>
        <?php while ($result = mysqli_fetch_assoc($results)): ?>
            <li><?php echo $result['titre'] ?? $result['nom'] . ' ' . $result['prenom']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
