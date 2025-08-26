HTML
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Accueil_Bulle</title>
</head>

<body>
    <header>
        <?php
        include("includes/topbar.php");
        ?>
        <!-- <div class="banniere"> <img src="images/bannière1.jpg" alt="banniere"></div> -->
        <div class="header">
            <div class="header-content">

                <h3 class="titre1">Plateforme en ligne de services de laverie connectée</h3>
                <h1>Fini les tracas de lessive <br>
                    Bulle s'occupe de tout.
                </h1>
                <h4>Bulle, c’est simple, rapide et propre !</h4>
                <div class="buttons">
                    <button type="submit">Essayer</button>
                    <button type="submit">Demo</button>
                </div>
            </div>
        </div>
    </header>
    <section class="sect1">
        <div class="box">
            <div class="left">
                <h2>Qui sommes-nous ?</h2>
                <p>Bulle, c’est la <strong>solution pensée pour toi </strong> .
                    <strong> Toujours là</strong>, <strong>où que tu sois</strong>, pour t’aider à gérer tes lessives et bien plus.
                </p>
            </div>
            <div class="right1">
                <div class="img-container">
                    <img src="images/emballeur.png" alt="Laverie AquaZen" class="img">
                    <div class="overlay">Laverie AquaZen</div>
                </div>
                <div class="img-container">
                    <img src="images/greant_laveriste.png" alt="Laverie ProNet" class="img">
                    <div class="overlay">Laverie ProNet</div>
                </div>
            </div>
        </div>

    </section>

    <section class="sect_pourquoi">
        <h2>Pourquoi choisir Bulle ?</h2>
        <div class="pourquoi_content">
            <div class="pourquoi_card">
                <i class="fas fa-clock"></i>
                <h3>Gain de Temps</h3>
                <p>Réservez et gérez votre lessive en quelques clics.</p>
            </div>
            <div class="pourquoi_card">
                <i class="fas fa-truck"></i>
                <h3>Livraison Rapide</h3>
                <p>Collecte et livraison à domicile ou au bureau.</p>
            </div>
            <div class="pourquoi_card">
                <i class="fas fa-shield-alt"></i>
                <h3>Fiabilité</h3>
                <p>Services professionnels avec des laveries certifiées.</p>
            </div>
        </div>
    </section>

    <section class="sect_acc">
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-title">Qu'est-ce que Bulle ?</div>
                <div class="accordion-content">
                    <p>Bulle est une application web intuitive qui permet de gérer facilement sa lessive, où que l'on soit. Elle met en relation les utilisateurs avec des laveries professionnelles situées à proximité, offrant ainsi un gain de temps, une meilleure organisation, et un accès rapide à des services de qualité. Grâce à une interface fluide et moderne, Bulle permet de planifier, suivre, payer et récupérer son linge sans tracas. L'objectif : simplifier la gestion de la lessive au quotidien tout en assurant un service fiable et professionnel.</p>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-title">Comment réserver une laverie ?</div>
                <div class="accordion-content">
                    <p>Pour réserver une laverie via Bulle, il vous suffit de :</p>
                    <ul>
                        <li>créer un compte ou de vous connecter</li>
                        <li>vous recherchez les laveries disponibles autour de vous grâce à la géolocalisation ou la barre de recherche</li>
                        <li>sélectionnez les services souhaités (lavage, repassage, nettoyage à sec, etc.)</li>
                        <li>choisissez une date et une heure de dépôt, puis validez votre commande</li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-title">Quels services sont disponibles ?</div>
                <div class="accordion-content">
                    <p><strong>Bulle</strong> propose une large gamme de services pour répondre à tous les besoins :</p>
                    <ul>
                        <li>Lavage de linge de maison (draps, couvertures, rideaux, etc.).</li>
                        <li>Désinfection et traitement anti-acariens.</li>
                        <li>Collecte et livraison à domicile ou sur votre lieu de travail.</li>
                        <li>Abonnements/carte de fidélité avec avantages réguliers.</li>
                        <li>Paiement en ligne via Mobile Money ou carte bancaire.</li>
                        <li>Suivi des commandes en ligne, avec notifications et historique.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="image-section">
            <img src="images/livreur2.jpg" alt="Laundry Service" id="serviceimage">
        </div>
    </section>


    <section class="avis-section">
        <h2>Ce qu'ils disent</h2>
        <div class="avis-container">
            <!-- Client 0 -->
            <div class="avis-card">
                <h3>Fatime Traoré</h3>
                <p class="buanderie">Plateau – Bu'erie</p>
                <p class="commentaire">“ J’ai découvert Bulle par hasard, et j’ai été agréablement surprise par la simplicité de l’application. <br>
                    j’ai cliqué ! Depuis, Bulle est mon réflexe. ” <br> <b class="stars">★★★★★</b></p>
            </div>
            <!-- Client 1 -->
            <div class="avis-card">
                <h3>Yao Taminy</h3>
                <p class="buanderie">Marcory – Buanderie CleanPlus</p>
                <div>
                    <p class="commentaire">“ Grâce à Bulle, j’ai trouvé une buanderie spécialisée dans le nettoyage des draps à seulement 5 minutes
                        <br> de chez moi.
                        ” <br> <b class="stars">★★★★★</b>
                    </p>
                </div>
            </div>
            <!-- Client 2 -->
            <div class="avis-card">
                <h3>Okou Marie-Iréne</h3>
                <p class="buanderie">Yopougon_Lav'Express </p>
                <div>
                    <p class="commentaire">“ Je cherchais une buanderie qui propose le repassage uniquement, et avec Bulle,
                        j’ai pu filtrer les services. <br> Très utile ! ” <br> <br><b class="stars">★★★★★</b>
                    </p>
                </div>
            </div>

            <!-- Client 3 -->
            <div class="avis-card">
                <h3>Bouraima Ahoua Paul </h3>
                <p class="buanderie">Buanderie_Cocody Angré </p>
                <div>
                    <p class="commentaire"> “ Ce que j’ai aimé avec Bulle, c’est la possibilité de voir les notes et les
                        commentaires laissés
                        <br> sur chaque buanderie. ”<br><br><br><b class="stars"> ★★★★★</b>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-content">
        <div class="newsletter">
            <h2>Abonnez-vous à notre newsletter</h2>
            <p>Restez informé des dernières offres et promotions exclusives !</p>
            <form>
                <input type="email" placeholder="Entrez votre email" required>
                <button type="submit">S'abonner</button>
            </form>
        </div>
    </section>

    <?php
    include("includes/footer.php");
    ?>

    <script>
        const titles = document.querySelectorAll('.accordion-title');
        const image = document.querySelector('#serviceImage');
        const images = [
            'images/livreur2.jpg',
            'images/telephone.jpg',
            'images/emballeur.png',
            'images/greant_laveriste.png',
        ];

        titles.forEach((title, index) => {
            title.addEventListener('click', () => {
                const item = title.parentElement;
                const allItems = document.querySelectorAll('.accordion-item');

                allItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });

                item.classList.toggle('active');

                if (item.classList.contains('active')) {
                    image.style.opacity = '0';
                    setTimeout(() => {
                        image.src = images[index % images.length];
                        image.style.opacity = '1';
                    }, 500);
                }
            });
        });

        function toggleChat() {
            const chatWindow = document.getElementById('chatWindow');
            chatWindow.style.display = chatWindow.style.display === 'none' ? 'block' : 'none';
        }

        function sendMessage() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            if (message) {
                const chatMessages = document.getElementById('chatMessages');
                chatMessages.innerHTML += `<p><strong>Vous:</strong> ${message}</p>`;
                input.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;
                // Simulate bot response
                setTimeout(() => {
                    chatMessages.innerHTML += `<p><strong>Bulle Bot:</strong> Merci pour votre message! Je vous répondrai bientôt.</p>`;
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
            }
        }
    </script>

</body>

</html>