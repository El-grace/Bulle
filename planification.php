<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/planification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Planification - Bulle</title>

</head>

</head>

<body>
    <?php
    include("includes/topbar.php");
    ?>
    <section class="container">
        <div class="form-section">
            <div class="info-box">
                Nom laverie, quartier<br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
            </div>

            <!-- Step 1: Planification -->
            <form action="planif_etp2.php" method="post" id="step1" class="step">
                <div class="form-group">
                    <label for="address">Adresse</label>
                    <input type="url" id="maplink" name="maplink" placeholder="Collez un lien Google Maps">
                </div>

                <div class="date-group">
                    <div class="form-group">
                        <label for="depositDate">Date dépôt</label>
                        <input type="date" id="depositDate" name="depositDate" required min="2025-08-19">
                    </div>
                    <div class="form-group">
                        <label for="pickupDate">Date récupération</label>
                        <input type="date" id="pickupDate" name="pickupDate" required>
                    </div>
                </div>

                <div class="form-group1">
                    <label>État :</label>
                    <div class="checkbox-group">
                        <label><input type="radio" name="status" value="express" required> Express</label>
                        <label><input type="radio" name="status" value="standard"> Standard</label>
                    </div>
                </div>

                <div class="types">
                    <div class="form-group2">
                        <p>Choisissez le type d'article :</p><br>

                        <input type="checkbox" id="vetements" name="article" value="vetements">
                        <label for="vetements">Vêtements</label><br>

                        <input type="checkbox" id="lingeMaison" name="article" value="linge_maison">
                        <label for="lingeMaison">Linge de maison</label><br>

                        <input type="checkbox" id="rideaux" name="article" value="rideaux">
                        <label for="rideaux">Rideaux</label><br>

                        <input type="checkbox" id="chaussures" name="article" value="chaussures">
                        <label for="chaussures">Chaussures</label><br>

                        <input type="checkbox" id="accessoires" name="article" value="accessoires">
                        <label for="accessoires">Accessoires (écharpes, ceintures, etc.)</label><br>

                        <input type="checkbox" id="couvertures" name="article" value="couvertures">
                        <label for="couvertures">Couvertures / Plaids</label>
                    </div>

                    <div class="form-group2">
                        <p>Choisissez vos services :</p><br>

                        <input type="checkbox" id="lavage" name="service" value="lavage">
                        <label for="lavage">Lavage & Séchage</label><br>

                        <input type="checkbox" id="repassage" name="service" value="repassage">
                        <label for="repassage">Repassage</label><br>

                        <input type="checkbox" id="pressing" name="service" value="nettoyage">
                        <label for="pressing">Nettoyage à sec (Pressing)</label><br>

                        <input type="checkbox" id="express" name="service" value="express">
                        <label for="express">Pressing express (24h)</label><br>

                        <input type="checkbox" id="pliage" name="service" value="pliage">
                        <label for="pliage">Pliage du linge</label><br>

                        <input type="checkbox" id="livraison" name="service" value="livraison">
                        <label for="livraison">Collecte et livraison à domicile</label>
                    </div>

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Ajoutez une description" required>
                </div>
                <div class="button-container">
                    <button type="submit" id="nextStep1" class="butn">Suivant</button>
                </div>

            </form>



            <div class="stage-section">
                <h2>Etape</h2>
                <ul id="stages">
                    <li class="active">1. Planification</li>
                    <li>2. Moyen de paiement</li>
                    <li>3. Statut de la planification</li>
                </ul>
            </div>
    </section>

</body>

</html>
<?php
include("includes/footer.php");
?>