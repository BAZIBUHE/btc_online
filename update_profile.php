<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['update_nom'])) {
    $new_nom = $_POST['nom'];
    $stmt = $conn->prepare("UPDATE users SET nom = ? WHERE id = ?");
    $stmt->bind_param("si", $new_nom, $user_id);
    $stmt->execute();
    header("Location: profile.php");
    exit();
}

if (isset($_POST['update_email'])) {
    $new_email = $_POST['email'];
    $stmt = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->bind_param("si", $new_email, $user_id);
    $stmt->execute();
    header("Location: profile.php");
    exit();
}

if (isset($_POST['update_info'])) {
    $new_info = $_POST['informations'];
    $stmt = $conn->prepare("UPDATE users SET informations = ? WHERE id = ?");
    $stmt->bind_param("si", $new_info, $user_id);
    $stmt->execute();
    header("Location: profile.php");
    exit();
}

if (isset($_POST['update_photo'])) {
    if ($_FILES['photo']['name'] != "") {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp_name = $_FILES['photo']['tmp_name'];
        $photo_path = "uploads/" . $photo_name;

        move_uploaded_file($photo_tmp_name, $photo_path);

        $stmt = $conn->prepare("UPDATE users SET photo = ? WHERE id = ?");
        $stmt->bind_param("si", $photo_name, $user_id);
        $stmt->execute();
        header("Location: profile.php");
        exit();
    }
}

header("Location: profile.php");
exit();
?>
