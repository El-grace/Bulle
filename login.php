<?php
session_start();
// Variables pour messages
$error = '';
$success = '';

if (
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["mdp"]) && !empty($_POST["mdp"])
) {
    $email = $_POST["email"];
    $mdp = sha1($_POST["mdp"]);

    include("connexion.php");

    // Vérifier si la connexion à la base a réussi
    if (!$conn) {
        header("Location: se_connecter.php?error=" . urlencode("Erreur de connexion "));
        exit();
    }

    $sql = "SELECT * FROM t_client WHERE mdp='$mdp' AND email='$email'";
    $stmt = $conn->query($sql);
    $user = $stmt->fetch();

    if (!$user) {
        header("Location: se_connecter.php?error=" . urlencode("Email ou mot de passe incorrect."));
        exit();
    }

    $_SESSION['email'] = $email;
    $_SESSION['mdp'] = $mdp;

    header("Location: index.php");
    exit();
} else {
    header("Location: se_connecter.php?error=" . urlencode("Veuillez remplir tous les champs."));
    exit();
}
