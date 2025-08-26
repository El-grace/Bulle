<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inscription Gérant - Bulle</title>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="images/emballeur.png" alt="">
        </div>
        <div class="form-section">
            <div class="step-indicator">
                Étape 1 Informations Personnelles
            </div>
            <p>Créez votre espace professionnel</p>
            <form action="inscription_2.php" method="POST" enctype="multipart/form-data">

                <!-- Étape 1 -->
                <div class="form-group">
                    <input type="text" name="full_name" placeholder="Nom Complet *"
                        required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email *" required>
                </div>
                <div class="form-group">
                    <input type="tel"
                        name="contact"
                        value="+225"
                        placeholder="Contact *"
                        pattern="^\+225\s?[0-9]{10}$"
                        maxlength="15"
                        required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de Passe *" required>
                </div>

                <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Confirmer Mot de Passe *" required>

                </div>
                <div class="btn">
                    <button type="submit" name="next">Suivant</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>