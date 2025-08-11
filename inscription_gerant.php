<?php
session_start();

if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
    $_SESSION['form_data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['next'])) {
        $_SESSION['form_data'] = array_merge($_SESSION['form_data'], $_POST);
        $_SESSION['step']++;
    } elseif (isset($_POST['previous'])) {
        $_SESSION['step']--;
    } elseif (isset($_POST['submit'])) {
        $_SESSION['form_data'] = array_merge($_SESSION['form_data'], $_POST);
        // Ici, vous pourriez ajouter la logique pour sauvegarder dans une base de données
        echo "Inscription terminée ! Données : " . print_r($_SESSION['form_data'], true);
        // Réinitialiser après soumission
        session_destroy();
        exit;
    }
}

$step = $_SESSION['step'];
$form_data = $_SESSION['form_data'];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/inscription_gerant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inscription Gérant - Bulle</title>
</head>

<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="form-section">
            <div class="step-indicator">Étape <?php echo $step; ?>/3: <?php echo $step == 1 ? 'Informations Personnelles' : ($step == 2 ? 'Informations Activités' : 'Documents'); ?></div>
            <h2>Inscription Gérant - Bulle</h2>
            <p>Créez votre espace professionnel</p>
            <form method="POST" enctype="multipart/form-data">
                <?php if ($step == 1): ?>
                    <div class="form-group"><input type="text" name="full_name" placeholder="Nom Complet *" value="<?php echo isset($form_data['full_name']) ? htmlspecialchars($form_data['full_name']) : ''; ?>" required></div>
                    <div class="form-group"><input type="email" name="email" placeholder="Email *" value="<?php echo isset($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?>" required></div>
                    <div class="form-group"><input type="text" name="contact" placeholder="Contact *" value="<?php echo isset($form_data['contact']) ? htmlspecialchars($form_data['contact']) : ''; ?>" required></div>
                    <div class="form-group"><input type="text" name="second_contact" placeholder="Deuxième Contact" value="<?php echo isset($form_data['second_contact']) ? htmlspecialchars($form_data['second_contact']) : ''; ?>"></div>
                    <div class="form-group"><input type="password" name="password" placeholder="Mot de Passe *" required></div>
                    <div class="form-group"><input type="password" name="confirm_password" placeholder="Confirmer Mot de Passe *" required></div>
                    <button type="submit" name="next">Suivant</button>

                <?php elseif ($step == 2): ?>
                    <div class="form-group"><input type="text" name="laundry_name" placeholder="Nom de la Buanderie *" value="<?php echo isset($form_data['laundry_name']) ? htmlspecialchars($form_data['laundry_name']) : ''; ?>" required></div>
                    <div class="form-group"><input type="email" name="laundry_email" placeholder="Email de la Buanderie *" value="<?php echo isset($form_data['laundry_email']) ? htmlspecialchars($form_data['laundry_email']) : ''; ?>" required></div>
                    <div class="form-group"><input type="text" name="laundry_address" placeholder="Adresse Locale *" value="<?php echo isset($form_data['laundry_address']) ? htmlspecialchars($form_data['laundry_address']) : ''; ?>" required></div>
                    <div class="form-group"><input type="text" name="neighborhood" placeholder="Quartier *" value="<?php echo isset($form_data['neighborhood']) ? htmlspecialchars($form_data['neighborhood']) : ''; ?>" required></div>
                    <div class="radio-group">
                        <label><input type="radio" name="delivery" value="yes" <?php echo isset($form_data['delivery']) && $form_data['delivery'] == 'yes' ? 'checked' : ''; ?>> Livrez-vous vos articles ? Oui</label>
                        <label><input type="radio" name="delivery" value="no" <?php echo isset($form_data['delivery']) && $form_data['delivery'] == 'no' ? 'checked' : ''; ?>> Non</label>
                    </div>
                    <div class="radio-group">
                        <label><input type="radio" name="payment_method" value="all" <?php echo isset($form_data['payment_method']) && $form_data['payment_method'] == 'all' ? 'checked' : ''; ?>> Tous les modes</label>
                        <label><input type="radio" name="payment_method" value="no_card" <?php echo isset($form_data['payment_method']) && $form_data['payment_method'] == 'no_card' ? 'checked' : ''; ?>> Tout sauf carte bancaire</label>
                        <label><input type="radio" name="payment_method" value="cash" <?php echo isset($form_data['payment_method']) && $form_data['payment_method'] == 'cash' ? 'checked' : ''; ?>> Espèce seulement</label>
                    </div>
                    <button type="submit" name="previous">Précédent</button>
                    <button type="submit" name="next">Suivant</button>

                <?php elseif ($step == 3): ?>
                    <div class="form-group"><input type="file" name="business_docs" placeholder="Documents Justificatifs" accept=".pdf,.jpg,.jpeg,.png"></div>
                    <div class="form-group"><input type="file" name="logo" placeholder="Logo ou Photo" accept=".jpg,.jpeg,.png"></div>
                    <div class="form-group"><input type="text" name="description" placeholder="Description de votre activité" value="<?php echo isset($form_data['description']) ? htmlspecialchars($form_data['description']) : ''; ?>"></div>
                    <div class="terms">
                        <input type="checkbox" name="terms_accepted" required>
                        <label>J'ai lu et j'accepte les conditions d'utilisation</label>
                    </div>
                    <button type="submit" name="previous">Précédent</button>
                    <button type="submit" name="submit">Créer mon espace</button>

                <?php endif; ?>
            </form>
        </div>
    </div>
</body>

</html>