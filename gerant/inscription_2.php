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
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <input type="text" name="nom" placeholder="Nom de la laverie *" required>
                </div>
                <div class="form-group">
                    <input type="email" name="laundry_email" placeholder="Email de la laverie *" required>
                </div>
                <div class="form-group">
                    <input type="text" name="adresse_postale" placeholder="Adresse Postale *"
                        value="<?php echo isset($form_data['adresse_postale']) ? htmlspecialchars($form_data['adresse_postale']) : ''; ?>"
                        required>
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
                <form method="post">
                    <div class="cont_btn">
                        <!-- Bouton Retour -->
                        <form method="post">
                            <button type="button" onclick="window.location.href='inscription.php';">
                                <i class="fa-solid fa-arrow-left"></i> Retour
                            </button>

                            <!-- Bouton Suivant -->
                            <button type="submit" name="suivant">
                                Suivant <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>

                    </div>

                    <?php
                    if (isset($_POST['suivant'])) {
                        header("Location: inscription_3.php");
                        exit();
                    }
                    ?>

                </form>

            </form>
        </div>
    </div>
</body>

</html>