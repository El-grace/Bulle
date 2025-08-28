<?php
session_start();
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_FILES['photo_activite']) && $_FILES['photo_activite']['error'] === UPLOAD_ERR_OK &&
        isset($_POST['description']) && !empty($_POST['description']) &&
        isset($_POST['terms_accepted']) && $_POST['terms_accepted'] === 'on'
    ) {
        $description = trim($_POST['description']);

        // Validation description
        $words = array_filter(explode(' ', $description));
        if (count($words) > 200) {
            $error = "La description ne doit pas dépasser 200 mots.";
        } else {
            $target_dir = "Uploads/";
            $max_size = 5 * 1024 * 1024; // 5MB
            $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0755, true);
            }

            // Sauvegarde photo activité
            if (
                $_FILES['photo_activite']['size'] > $max_size ||
                !in_array($_FILES['photo_activite']['type'], $allowed_types)
            ) {
                $error = "Fichier logo/photo invalide. Assurez-vous que le fichier est au format JPEG, PNG ou PDF et ne dépasse pas 5 Mo.";
            } else {
                $photo_activite = $target_dir . "photo_activite_" . time() . "_" . basename($_FILES['photo_activite']['name']);
                if (!move_uploaded_file($_FILES['photo_activite']['tmp_name'], $photo_activite)) {
                    $error = "Erreur lors de l'enregistrement du fichier.";
                } else {
                    // Autre doc (facultatif)
                    $autre_doc = null;
                    if (isset($_FILES['autre_doc']) && $_FILES['autre_doc']['error'] === UPLOAD_ERR_OK) {
                        if ($_FILES['autre_doc']['size'] <= $max_size && in_array($_FILES['autre_doc']['type'], $allowed_types)) {
                            $autre_doc = $target_dir . "autre_doc_" . time() . "_" . basename($_FILES['autre_doc']['name']);
                            move_uploaded_file($_FILES['autre_doc']['tmp_name'], $autre_doc);
                        }
                    }

                    // Enregistrer dans session
                    $_SESSION['gerant']['photo_activite'] = $photo_activite;
                    $_SESSION['gerant']['autre_doc'] = $autre_doc;
                    $_SESSION['gerant']['description'] = $description;

                    $success = "Inscription réussie ! Vous allez être redirigé dans quelques secondes.";
                    header("Refresh: 3; url=se_connecter.php"); // Augmenter le délai à 3 secondes
                    exit;
                }
            }
        }
    } else {
        $error = "Veuillez uploader un fichier valide, remplir la description et accepter les conditions d'utilisation.";
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
    <title>Inscription Gérant - Bulle</title>
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
            <img src="images/emballeur.png" alt="">
        </div>
        <div class="form-section">
            <div class="step-indicator">
                Étape 3 Documents Justificatifs
            </div>
            <p>Créez votre espace professionnel</p>
            <form action="inscription_3.php" method="POST" enctype="multipart/form-data">
                <?php if ($error): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="photo_activite">Logo ou photo de votre activité</label>
                    <input type="file" name="photo_activite" required accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div class="form-group">
                    <label for="autre_doc">Autres documents (facultatif)</label>
                    <input type="file" name="autre_doc" accept=".jpg,.jpeg,.png,.pdf">
                </div>
                <div class="form-group">
                    <label for="description">Description de votre activité</label>
                    <textarea name="description" id="description" placeholder="Ex : Ma Buanderie est spécialisée dans le repassage et la lessive à domicile" required></textarea>
                    <small id="wordCount">200 mots restants</small>
                </div>

                <script>
                    const textarea = document.getElementById('description');
                    const wordCount = document.getElementById('wordCount');
                    const maxWords = 200;

                    textarea.addEventListener('input', () => {
                        let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
                        if (words.length > maxWords) {
                            words = words.slice(0, maxWords);
                            textarea.value = words.join(' ');
                        }
                        const remaining = maxWords - words.length;
                        wordCount.textContent = `${remaining} mots restants`;
                        wordCount.style.color = remaining === 0 ? 'red' : 'black';
                    });
                </script>

                <div class="terms">
                    <input type="checkbox" name="terms_accepted" required>
                    <label>J'ai lu et j'accepte les conditions d'utilisation</label>
                </div>
                <div class="cont_btn">
                    <button type="button" onclick="window.location.href='inscription_2.php';">
                        <i class="fa-solid fa-arrow-left"></i> Retour
                    </button>
                    <button type="submit" name="suivant">
                        Suivant <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>