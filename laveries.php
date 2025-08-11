<?php
include("includes/connexion.php");
// Récupérer toutes les laveries depuis la table t_laveries
$stmt = $pdo->query("SELECT * FROM t_laveries");
$laveries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/laveries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Laveries_Bulle</title>
</head>

<body>
    <header>
        <?php include("includes/topbar.php"); ?>
        <main>
            <div class="search-filter">
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder="Nom ou quartier...">
                    <i class="fas fa-search"></i>
                </div>
                <div class="filter-container">
                    <i class="fas fa-filter filter-icon"></i>
                    <div class="filter-menu">
                        <div data-filter="all">Toutes les laveries</div>
                        <div data-filter="nearby">A proximité</div>
                        <div data-filter="district">Par quartier</div>
                    </div>
                    <select id="districtSelect" class="district-select">
                        <option value="">--Choisir un quartier--</option>
                        <option value="siporex" data-lat="5.339" data-lng="-4.059">Siporex</option>
                        <option value="toit-rouge" data-lat="5.340" data-lng="-4.060">Toit Rouge</option>
                        <option value="niangon" data-lat="5.345" data-lng="-4.065">Niangon</option>
                        <option value="anador" data-lat="5.360" data-lng="-4.070">Anador</option>
                    </select>
                </div>
            </div>
            <div id="laundryList">
                <?php foreach ($laveries as $laverie): ?>
                    <div class="laundry" data-name="<?php echo htmlspecialchars($laverie['nom']); ?>"
                        data-district="<?php echo htmlspecialchars($laverie['lieu'] ?? ''); ?>"
                        data-lat="<?php echo htmlspecialchars($laverie['latitude'] ?? 0); ?>"
                        data-lng="<?php echo htmlspecialchars($laverie['longitude'] ?? 0); ?>">
                        <?php echo htmlspecialchars($laverie['nom']) . ' - ' . htmlspecialchars($laverie['lieu'] ?? ''); ?>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="carousel-container">
                <div class="carousel">
                    <div class="slide">
                        <img src="images/slide_laverie.jpg" alt="Laverie 1">
                        <img src="images/slide_laverie2.jpg" alt="Laverie 2">
                        <img src="images/slide_laverie3.jpg" alt="Laverie 3">
                        <img src="images/slide_laverie4.jpg" alt="Laverie 4">
                    </div>
                    <button class="bton_carousel prev-btn"><i class="fas fa-chevron-left"></i></button>
                    <button class="bton_carousel next-btn"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </main>

        <section class="info-laundry">
            <?php foreach ($laveries as $laverie): ?>
                <div class="laundry_des" data-name="<?php echo htmlspecialchars($laverie['nom']); ?>">
                    <i class="fas fa-washing-machine icone_laundry"></i>
                    <div class="details">
                        <div class="address">
                            <div><?php echo htmlspecialchars($laverie['nom']); ?>,<em>
                                    <a href="https://maps.google.com/?q=<?php echo urlencode($laverie['address']); ?>" target="_blank">
                                        <?php echo htmlspecialchars($laverie['address']); ?>
                                    </a></em></div>
                        </div>
                        <div class="description">
                            <?php echo htmlspecialchars($laverie['description'] ?? ''); ?>
                            <em class="hours"><?php echo htmlspecialchars($laverie['horaires'] ?? 'Horaires non disponibles'); ?></em>
                        </div>
                        <div class="contact">
                            <?php if (!empty($laverie['telephone'])): ?>
                                <a href="tel:<?php echo htmlspecialchars($laverie['telephone']); ?>"><i class="fas fa-phone"></i> <?php echo htmlspecialchars($laverie['telephone']); ?></a> &nbsp;&nbsp;&nbsp;
                            <?php endif; ?>
                            <?php if (!empty($laverie['email'])): ?>
                                <a href="mailto:<?php echo htmlspecialchars($laverie['email']); ?>"><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($laverie['email']); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="evaluation">
                            <span class="evalu"><?php echo htmlspecialchars($laverie['note'] ?? 0); ?></span>
                            <i class="fas fa-star"></i>
                            <span class="reviews">(<?php echo htmlspecialchars($laverie['nbre_note'] ?? 0); ?> avis)</span>
                        </div>
                    </div>
                    <div class="arrow"><a href="planification.php">›</a></div>
                </div>
            <?php endforeach; ?>
        </section>
        <div class="pagination">
            <button id="prevBtn" class="btn_pagination"><i class="fas fa-chevron-left"></i></button>
            <span class="page-info" id="pageInfo">Page 1 sur 2</span>
            <button id="nextBtn" class="btn_pagination"><i class="fas fa-chevron-right"></i></button>
        </div>
</body>
<script src="Style/laveries.js"></script>
<?php include("includes/footer.php"); ?>

</html>