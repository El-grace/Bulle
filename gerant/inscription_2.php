<?php
// Variables pour messages
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST["nom_laverie"]) && !empty($_POST["nom_laverie"]) &&
        isset($_POST["email_laverie"]) && !empty($_POST["email_laverie"]) &&
        isset($_POST["localisation"]) && !empty($_POST["localisation"]) &&
        isset($_POST["contact_laverie"]) && !empty($_POST["contact_laverie"])
    ) {
        $nom_laverie = $_POST["nom_laverie"];
        $email_laverie = $_POST["email_laverie"];
        $localisation = $_POST["localisation"];
        $contact_laverie = $_POST["contact_laverie"];

        // Validations avant connexion à la base
        if (!preg_match('/^[0-9]{10}$/', $contact_laverie)) {
            $error = "Le contact doit contenir exactement 10 chiffres.";
        } else {
            include("includes/connexion.php");

            // Vérifier si la connexion a réussi
            if (!$conn) {
                $error = "Erreur de connexion à la base de données.";
            } else {
                // Vérifier l'unicité de l'email
                $checkEmailQuery = "SELECT email_laverie FROM t_gerant WHERE email_laverie = '$email_laverie'";
                $checkEmailResult = $conn->query($checkEmailQuery);
                if ($checkEmailResult->fetch()) {
                    $error = "Cet email est déjà utilisé.";
                } else {
                    $contact_laverie = "+225" . $contact_laverie; // Ajouter +225 pour la base
                    $date = date("Y-m-d");

                    // Requête SQL
                    $req = "INSERT INTO t_gerant (nom_laverie, email_laverie, localisation, contact_laverie, date)
                            VALUES ('$nom_laverie', '$email_laverie', '$localisation', '$contact_laverie', '$date')";

                    $rep = $conn->exec($req);

                    if ($rep === false) {
                        $error = "Erreur lors de l'insertion dans la base de données. Vérifiez les données.";
                    } else {
                        $success = "Informations Personnelles enregistrées ! ";
                        header("Refresh: 3; url=inscription_3.php");
                    }
                }
            }
        }
    } else {
        $error = "Veuillez remplir tous les champs et accepter les conditions.";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Inscription Gérant - Bulle</title>
    <style>
        /* Styles pour messages */
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
            <img src="images/emballeur.png" alt="">
        </div>
        <div class="form-section">
            <div class="step-indicator">
                Étape 2 Informations Laverie
            </div>
            <p>Créez votre espace professionnel</p>
            <form action="inscription_2.php" method="POST" enctype="multipart/form-data">
                <?php if ($error): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>

                <div class="form-group">
                    <input type="text" name="nom_laverie" placeholder="Nom de la laverie" required value="<?php echo isset($_POST['nom_laverie']) ? htmlspecialchars($_POST['nom_laverie']) : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email_laverie" placeholder="Email de la laverie" required value="<?php echo isset($_POST['email_laverie']) ? htmlspecialchars($_POST['email_laverie']) : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="text" name="localisation" placeholder="localisation"
                        value="<?php echo isset($form_data['localisation']) ? htmlspecialchars($form_data['localisation']) : ''; ?>"
                        required>
                </div>

                <div class="form-group">
                    <input type="tel" placeholder="Contact (10 chiffres)" name="contact_laverie" required pattern="[0-9]{10}" maxlength="10" value="<?php echo isset($_POST['contact_laverie']) ? htmlspecialchars($_POST['contact_laverie']) : ''; ?>">
                </div>
                <div class="radio-group">
                    <label>Livrez-vous vos articles ?</label>

                    <label><input type="radio" name="delivery" value="oui"> Oui
                    </label>
                    <label>
                        <input type="radio" name="delivery" value="non">Non</label>
                </div>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="payment_method" value="all"> Tous les modes
                    </label>
                    <label>
                        <input type="radio" name="payment_method" value="no_card"> Tout sauf carte bancaire</label>
                    <label>
                        <input type="radio" name="payment_method" value="cash"> Espèce seulement
                    </label>
                </div>
                <div class="cont_btn">
                    <!-- Bouton Retour -->
                    <button type="button" onclick="window.location.href='inscription.php';">
                        <i class="fa-solid fa-arrow-left"></i> Retour
                    </button>

                    <!-- Bouton Suivant -->
                    <button type="submit" name="suivant">
                        Suivant <i class="fa-solid fa-arrow-right"></i>
                    </button>

                </div>
        </div>
</body>

</html>