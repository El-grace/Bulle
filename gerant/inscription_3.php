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
                Étape 3 Documents Justificatifs
            </div>
            <p>Créez votre espace professionnel</p>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="logo">Logo ou photo de votre activité</label>
                    <input type="file" name="business_docs" placeholder="Logo ou photo de votre activité" required accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div class="form-group">
                    <label for="other_docs">Autres documents (facultatif)</label>
                    <input type="file" name="logo" placeholder="Logo ou Photo" accept=".jpg,.jpeg,.png">
                </div>
                <div class="form-group">
                    <label for="description">Description de votre activité </label>
                    <textarea
                        name="description"
                        id="description"
                        placeholder="Ex : Ma Buanderie est spécialisée dans le repassage et la lessive à domicile" required></textarea>
                    <small id="wordCount">200/200</small>
                </div>

                <script>
                    const textarea = document.getElementById('description');
                    const wordCount = document.getElementById('wordCount');
                    const maxWords = 200;

                    textarea.addEventListener('input', () => {
                        // Séparer les mots et supprimer les espaces vides
                        let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);

                        // Empêcher de dépasser 200 mots
                        if (words.length > maxWords) {
                            words = words.slice(0, maxWords);
                            textarea.value = words.join(' ');
                        }

                        // Mettre à jour le compteur
                        const remaining = maxWords - words.length;
                        wordCount.textContent = `${remaining} mots restants`;

                        // Changer la couleur si limite atteinte
                        wordCount.style.color = remaining === 0 ? 'red' : 'black';
                    });
                </script>


                <div class="terms">
                    <input type="checkbox" name="terms_accepted" required>
                    <label>J'ai lu et j'accepte les conditions d'utilisation</label>
                </div>
                <form method="post">
                    <div class="cont_btn">
                        <!-- Bouton Retour -->
                        <button type="button" onclick="window.location.href='inscription_2.php';">
                            <i class="fa-solid fa-arrow-left"></i> Retour
                        </button>

                        <!-- Bouton Suivant -->
                        <button type="submit" name="suivant">
                            Suivant <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                    <?php
                    if (isset($_POST['suivant'])) {
                        header("Location: otp.php");
                        exit();
                    }
                    ?>
                </form>
        </div>
    </div>
</body>

</html>