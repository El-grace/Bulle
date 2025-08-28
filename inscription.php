<?php
// Variables pour messages
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont remplis
    if (
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["prenom"]) && !empty($_POST["prenom"]) &&
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["contact"]) && !empty($_POST["contact"]) &&
        isset($_POST["mdp"]) && !empty($_POST["mdp"]) &&
        isset($_POST["confirmation"]) && !empty($_POST["confirmation"]) &&
        isset($_POST["terms"])
    ) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $mdp = $_POST["mdp"];
        $confirmation = $_POST["confirmation"];

        // Validations avant connexion à la base
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "L'email n'est pas valide.";
        } elseif (!preg_match('/^[0-9]{10}$/', $contact)) {
            $error = "Le contact doit contenir exactement 10 chiffres.";
        } elseif ($mdp != $confirmation) {
            $error = "Les deux mots de passe sont différents.";
        } else {
            include("connexion.php");

            // Vérifier si la connexion a réussi
            if (!$conn) {
                $error = "Erreur de connexion à la base de données.";
            } else {
                // Vérifier l'unicité de l'email
                $checkEmailQuery = "SELECT email FROM t_client WHERE email = '$email'";
                $checkEmailResult = $conn->query($checkEmailQuery);
                if ($checkEmailResult->fetch()) {
                    $error = "Cet email est déjà utilisé.";
                } else {
                    $contact = "+225" . $contact; // Ajouter +225 pour la base
                    $mdp = sha1($mdp);
                    $confirmation = sha1($confirmation);
                    $date = date("Y-m-d");

                    // Requête SQL
                    $req = "INSERT INTO t_client (nom, prenom, email, contact, mdp, confirmation, date)
                            VALUES ('$nom', '$prenom', '$email', '$contact', '$mdp', '$confirmation', '$date')";

                    $rep = $conn->exec($req);

                    if ($rep === false) {
                        $error = "Erreur lors de l'insertion dans la base de données. Vérifiez les données ou contactez l'admin.";
                    } else {
                        $success = "Inscription réussie ! ";
                        header("Refresh: 3; url=se_connecter.php");
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
    <title>Inscription - Bulle</title>
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
        <div class="slider">
            <div class="slides" id="slides">
                <div class="slide"><img src="images/client_dame.jpg" alt="Slide 1"></div>
                <div class="slide"><img src="images/livreur2.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="images/livreur.jpg" alt="Slide 3"></div>
            </div>
            <div class="slider-nav" id="slider-nav">
                <span onclick="currentSlide(1)"></span>
                <span onclick="currentSlide(2)"></span>
                <span onclick="currentSlide(3)"></span>
            </div>
        </div>
        <form action="inscription.php" class="form-section" method="POST">
            <!-- Affichage des messages -->
            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <div class="form-group">
                <input type="text" placeholder="Nom" required name="nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Prénom" name="prenom" required value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="tel" placeholder="Contact (10 chiffres)" name="contact" required pattern="[0-9]{10}" maxlength="10" value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Mot de passe" name="mdp" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirmer le mot de passe" name="confirmation" required>
            </div>
            <div class="terms">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">J'accepte toutes les conditions</label>
            </div>
            <div>
                <button type="submit">S'inscrire</button>
                <div class="login-text">Vous avez déjà un compte ? <a href="se_connecter.php">Se connecter</a></div>
            </div>
        </form>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let slides = document.getElementById("slides");
            let dots = document.getElementById("slider-nav").getElementsByTagName("span");
            if (n > dots.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = dots.length;
            }
            slides.style.transform = `translateX(-${(slideIndex - 1) * (100 / dots.length)}%)`;
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[slideIndex - 1].className += " active";
        }

        setInterval(() => {
            showSlides(slideIndex += 1);
        }, 5000);
    </script>
</body>

</html>