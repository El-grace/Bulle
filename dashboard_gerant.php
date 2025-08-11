<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Laverie</title>
    <link rel="stylesheet" href="Style/dashboard_gerant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="dashboard">
        <header class="dashboard-header">
            <h1 class="dashboard-title">Tableau de Bord - Gestion Laverie</h1>
        </header>

        <div class="dashboard-content">
            <!-- Résumé / Indicateurs clés -->
            <section class="indicateurs">
                <div class="card">
                    <h3>Commandes en cours</h3>
                    <p>15</p>
                </div>
                <div class="card">
                    <h3>Commandes livrées</h3>
                    <p>25</p>
                </div>
                <div class="card">
                    <h3>Commandes en attente</h3>
                    <p>5</p>
                </div>
                <div class="card">
                    <h3>Montant aujourd'hui</h3>
                    <p>45,500.00 FCFA</p>
                </div>
                <div class="card">
                    <h3>Montant cette semaine</h3>
                    <p>150,000.00 FCFA</p>
                </div>
                <div class="card">
                    <h3>Clients actifs</h3>
                    <p>50</p>
                </div>
            </section>

            <!-- Liste des commandes ou réservations -->
            <section class="commandes">
                <h2 class="section-title">Liste des Commandes</h2>
                <div class="commandes-list">
                    <div class="commande-item">
                        <span class="label">Statut :</span> <span class="value">en cours</span>
                        <span class="label">Client :</span> <span class="value">Jean Dupont</span>
                        <span class="label">Date/Heure :</span> <span class="value">2025-08-07 14:30</span>
                        <span class="label">Type de Service :</span> <span class="value">lavage</span>
                        <span class="label">Statut Livraison :</span> <span class="value">en attente</span>
                    </div>
                    <div class="commande-item">
                        <span class="label">Statut :</span> <span class="value">livré</span>
                        <span class="label">Client :</span> <span class="value">Marie Leclerc</span>
                        <span class="label">Date/Heure :</span> <span class="value">2025-08-06 10:15</span>
                        <span class="label">Type de Service :</span> <span class="value">repassage</span>
                        <span class="label">Statut Livraison :</span> <span class="value">livré</span>
                    </div>
                    <div class="commande-item">
                        <span class="label">Statut :</span> <span class="value">en attente</span>
                        <span class="label">Client :</span> <span class="value">Pierre Martin</span>
                        <span class="label">Date/Heure :</span> <span class="value">2025-08-08 09:00</span>
                        <span class="label">Type de Service :</span> <span class="value">livraison</span>
                        <span class="label">Statut Livraison :</span> <span class="value">en cours</span>
                    </div>
                </div>
            </section>

            <!-- Notifications et alertes -->
            <section class="notifications">
                <h2 class="section-title">Notifications</h2>
                <ul class="alerts-list">
                    <li><strong>Commandes en retard :</strong> <span class="value">2</span></li>
                    <li><strong>Paiements en attente :</strong> <span class="value">1</span></li>
                    <li><strong>Réclamations :</strong> <span class="value">0</span></li>
                </ul>
            </section>

            <!-- Planning / agenda -->
            <section class="planning">
                <h2 class="section-title">Planning</h2>
                <p>Créneaux horaires et disponibilités du personnel à implémenter.</p>
            </section>

            <!-- Rapports et statistiques -->
            <section class="rapports">
                <h2 class="section-title">Rapports</h2>
                <div class="rapport-item">
                    <span class="label">Chiffre d'affaires :</span> <span class="value">Aujourd'hui: 45,500.00 FCFA</span>
                    <span class="label"></span> <span class="value">Semaine: 150,000.00 FCFA</span>
                </div>
                <div class="rapport-item">
                    <span class="label">Evolution commandes :</span> <span class="value">À implémenter</span>
                </div>
                <div class="rapport-item">
                    <span class="label">Satisfaction :</span> <span class="value">Moyenne: 4.2 / 5 (25 avis)</span>
                </div>
            </section>
        </div>
    </div>
    <script src="Style/dashboard.js"></script>
</body>

</html>