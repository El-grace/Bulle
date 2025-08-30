<?php
session_start();
// Variables pour messages
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST['nom_complet']) && !empty($_POST['nom_complet']) &&
        isset($_POST['email_gerant']) && !empty($_POST['email_gerant']) &&
        isset($_POST['contact_gerant']) && !empty($_POST['contact_gerant']) &&
        isset($_POST['mdp']) && !empty($_POST['mdp']) &&
        isset($_POST['confirmation']) && !empty($_POST['confirmation'])
    ) {
        $nom_complet = $_POST['nom_complet'];
        $email_gerant = $_POST['email_gerant'];
        $contact_gerant = $_POST['contact_gerant'];
        $mdp = $_POST['mdp'];
        $confirmation = $_POST['confirmation'];

        // Validations
        if (!filter_var($email_gerant, FILTER_VALIDATE_EMAIL)) {
            $error = "L'email n'est pas valide.";
        } elseif (!preg_match('/^[0-9]{10}$/', $contact_gerant)) {
            $error = "Le contact doit contenir exactement 10 chiffres.";
        } elseif ($mdp !== $confirmation) {
            $error = "❌ Les mots de passe ne correspondent pas.";
        } else {
            include("includes/connexion.php");
            if (!$conn) {
                $error = "Erreur de connexion à la base de données.";
            } else {
                // Vérifier si l'email existe déjà
                $checkEmailQuery = "SELECT email_gerant FROM t_gerant WHERE email_gerant = :email_gerant";
                $stmt = $conn->prepare($checkEmailQuery);
                $stmt->execute(['email_gerant' => $email_gerant]);
                if ($stmt->fetch()) {
                    $error = "Cet email est déjà utilisé.";
                } else {
                    // Stocker dans la session pour les étapes suivantes
                    $_SESSION['gerant']['nom_complet'] = $nom_complet;
                    $_SESSION['gerant']['email_gerant'] = $email_gerant;
                    $_SESSION['gerant']['contact_gerant'] = "+225" . $contact_gerant;
                    $_SESSION['gerant']['mdp'] = password_hash($mdp, PASSWORD_DEFAULT);
                    $_SESSION['gerant']['confirmation'] = password_hash($confirmation, PASSWORD_DEFAULT);
                    $_SESSION['gerant']['date'] = date("Y-m-d");

                    $success = "Informations personnelles enregistrées ! Redirection dans 3 secondes...";
                    header("Refresh: 3; url=inscription_2.php");
                }
            }
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inscription Gérant - Étape 1 : Informations Personnelles - Bulle</title>
    <style>
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="images/emballeur.png" alt="Emballeur">
        </div>
        <div class="form-section">
            <div class="step-indicator">
                Étape 1 : Informations Personnelles
            </div>
            <p>Créez votre espace professionnel</p>
            <form action="" method="POST">
                <?php if ($error): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>
                <div class="form-group">
                    <input type="text" name="nom_complet" placeholder="Nom complet" required value="<?php echo isset($_POST['nom_complet']) ? htmlspecialchars($_POST['nom_complet']) : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email_gerant" placeholder="Email gérant" required value="<?php echo isset($_POST['email_gerant']) ? htmlspecialchars($_POST['email_gerant']) : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="tel" name="contact_gerant" placeholder="Contact (10 chiffres)" required pattern="[0-9]{10}" maxlength="10" value="<?php echo isset($_POST['contact_gerant']) ? htmlspecialchars($_POST['contact_gerant']) : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="password" name="mdp" placeholder="Mot de passe *" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirmation" placeholder="Confirmer mot de passe *" required>
                </div>
                <div class="btn">
                    <button type="submit" name="next">Suivant</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>