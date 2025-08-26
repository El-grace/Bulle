<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style//planif_etp2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Planification - Bulle</title>

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
            <div id="step1" class="step">
                <!-- Partie Tarifs - En carousel slide -->
                <section class="tarifs-section">
                    <h2>Tarifs par Type d'Article</h2>
                    <div class="tarifs-carousel">
                        <button class="carousel-btn prev" onclick="slidePrev()">&#10094;</button>
                        <div class="tarifs-cards" id="carousel">
                            <div class="tarif-card">
                                <div class="icon icon-blue">👕</div>
                                <h3 class="title">Top</h3>
                                <p class="desc">Pour les hauts comme t-shirts, chemises, etc.</p>
                                <small class="subtitle">nettoyage standard</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 200 FCFA </span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">👗</div>
                                <h3 class="title">Robe</h3>
                                <p class="desc">Pour les robes simples et élégantes.</p>
                                <small class="subtitle">pressing + repassage</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 300 FCFA </span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">🧥</div>
                                <h3 class="title">Veste</h3>
                                <p class="desc">Pour les vestes et manteaux légers.</p>
                                <small class="subtitle">nettoyage délicat</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 500 FCFA </span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">👔</div>
                                <h3 class="title">Costume</h3>
                                <p class="desc">Pour les costumes complets et formels.</p>
                                <small class="subtitle">pressing + sur cintres</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 1000 FCFA</span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">👰</div>
                                <h3 class="title">Robe de Mariage</h3>
                                <p class="desc">Pour les robes de mariage délicates et volumineuses.</p>
                                <small class="subtitle">nettoyage personnalisé</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 1500 FCFA </span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">🛁</div>
                                <h3 class="title">Serviette</h3>
                                <p class="desc">Pour les serviettes et linges de bain.</p>
                                <small class="subtitle">laver + sécher</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE : 500 FCFA</span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">👞</div>
                                <h3 class="title">Chaussures (Nettoyage Standard)</h3>
                                <p class="desc">Pour les chaussures quotidiennes.</p>
                                <small class="subtitle">nettoyage standard</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR PAIRE : 500 FCFA</span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">👞</div>
                                <h3 class="title">Chaussures (Dry Clean)</h3>
                                <p class="desc">Pour les chaussures délicates nécessitant un nettoyage à sec.</p>
                                <small class="subtitle">dry clean + entretien</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR PAIRE</span>
                                    <span>à partir de 700 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">🛏️</div>
                                <h3 class="title">Couette</h3>
                                <p class="desc">Pour les couettes et couvertures volumineuses.</p>
                                <small class="subtitle">nettoyage spécial</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 2000 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">🛏️</div>
                                <h3 class="title">Drap</h3>
                                <p class="desc">Pour les draps et linges de lit.</p>
                                <small class="subtitle">laver + repassage</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 1000 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">👔</div>
                                <h3 class="title">Chemise</h3>
                                <p class="desc">Pour les chemises et blouses.</p>
                                <small class="subtitle">pressing + repassage</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 250 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">👖</div>
                                <h3 class="title">Pantalon</h3>
                                <p class="desc">Pour les pantalons et jeans.</p>
                                <small class="subtitle">nettoyage standard</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 400 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">👗</div>
                                <h3 class="title">Jupe</h3>
                                <p class="desc">Pour les jupes simples et élégantes.</p>
                                <small class="subtitle">pressing + repassage</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 300 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-green">🪟</div>
                                <h3 class="title">Rideau</h3>
                                <p class="desc">Pour les rideaux et voilages.</p>
                                <small class="subtitle">nettoyage délicat</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 1500 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                            <div class="tarif-card">
                                <div class="icon icon-blue">🧼</div>
                                <h3 class="title">Tapis</h3>
                                <p class="desc">Pour les tapis et moquettes petites.</p>
                                <small class="subtitle">nettoyage profond</small>
                                <div class="price-block blue">
                                    <span>PRIX PAR ARTICLE</span>
                                    <span>à partir de 2500 FCFA</span>
                                    <span class="arrow">></span>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-btn next" onclick="slideNext()">&#10095;</button>
                    </div>
                </section>
                <!-- Partie Nombre d'Articles à Déposer -->
                <section class="articles-section">
                    <h2>Nombre d'Articles à Déposer</h2>
                    <div class="articles-list">
                        <div class="article-item" data-price="200">
                            <span class="article-name">Tops</span>
                            <div class="counter">
                                <button onclick="decrement('top')">-</button>
                                <input type="number" id="top" value="0" min="0" max="100" readonly>
                                <button onclick="increment('top')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-top">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="300">
                            <span class="article-name">Robe</span>
                            <div class="counter">
                                <button onclick="decrement('robe')">-</button>
                                <input type="number" id="robe" value="0" min="0" max="100" readonly>
                                <button onclick="increment('robe')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-robe">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="500">
                            <span class="article-name">Veste</span>
                            <div class="counter">
                                <button onclick="decrement('veste')">-</button>
                                <input type="number" id="veste" value="0" min="0" max="100" readonly>
                                <button onclick="increment('veste')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-veste">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="1000">
                            <span class="article-name">Costume</span>
                            <div class="counter">
                                <button onclick="decrement('costume')">-</button>
                                <input type="number" id="costume" value="0" min="0" max="100" readonly>
                                <button onclick="increment('costume')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-costume">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="1500">
                            <span class="article-name">Robe de Mariage</span>
                            <div class="counter">
                                <button onclick="decrement('robe-mariage')">-</button>
                                <input type="number" id="robe-mariage" value="0" min="0" max="100" readonly>
                                <button onclick="increment('robe-mariage')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-robe-mariage">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="500">
                            <span class="article-name">Serviette</span>
                            <div class="counter">
                                <button onclick="decrement('serviette')">-</button>
                                <input type="number" id="serviette" value="0" min="0" max="100" readonly>
                                <button onclick="increment('serviette')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-serviette">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="500">
                            <span class="article-name">Chaussures (Nettoyage Standard)</span>
                            <div class="counter">
                                <button onclick="decrement('chaussures-standard')">-</button>
                                <input type="number" id="chaussures-standard" value="0" min="0" max="100" readonly>
                                <button onclick="increment('chaussures-standard')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-chaussures-standard">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="700">
                            <span class="article-name">Chaussures (Dry Clean)</span>
                            <div class="counter">
                                <button onclick="decrement('chaussures-dry')">-</button>
                                <input type="number" id="chaussures-dry" value="0" min="0" max="100" readonly>
                                <button onclick="increment('chaussures-dry')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-chaussures-dry">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="2000">
                            <span class="article-name">Couette</span>
                            <div class="counter">
                                <button onclick="decrement('couette')">-</button>
                                <input type="number" id="couette" value="0" min="0" max="100" readonly>
                                <button onclick="increment('couette')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-couette">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="1000">
                            <span class="article-name">Drap</span>
                            <div class="counter">
                                <button onclick="decrement('drap')">-</button>
                                <input type="number" id="drap" value="0" min="0" max="100" readonly>
                                <button onclick="increment('drap')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-drap">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="250">
                            <span class="article-name">Chemise</span>
                            <div class="counter">
                                <button onclick="decrement('chemise')">-</button>
                                <input type="number" id="chemise" value="0" min="0" max="100" readonly>
                                <button onclick="increment('chemise')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-chemise">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="400">
                            <span class="article-name">Pantalon</span>
                            <div class="counter">
                                <button onclick="decrement('pantalon')">-</button>
                                <input type="number" id="pantalon" value="0" min="0" max="100" readonly>
                                <button onclick="increment('pantalon')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-pantalon">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="300">
                            <span class="article-name">Jupe</span>
                            <div class="counter">
                                <button onclick="decrement('jupe')">-</button>
                                <input type="number" id="jupe" value="0" min="0" max="100" readonly>
                                <button onclick="increment('jupe')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-jupe">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="1500">
                            <span class="article-name">Rideau</span>
                            <div class="counter">
                                <button onclick="decrement('rideau')">-</button>
                                <input type="number" id="rideau" value="0" min="0" max="100" readonly>
                                <button onclick="increment('rideau')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-rideau">0 FCFA</span>
                        </div>
                        <div class="article-item" data-price="2500">
                            <span class="article-name">Tapis</span>
                            <div class="counter">
                                <button onclick="decrement('tapis')">-</button>
                                <input type="number" id="tapis" value="0" min="0" max="100" readonly>
                                <button onclick="increment('tapis')">+</button>
                            </div>
                            <span class="subtotal" id="subtotal-tapis">0 FCFA</span>
                        </div>
                    </div>
                    <div class="info-message">
                        <span class="star">*</span> L'estimation n'est fournie qu'à titre d'information. Le prix final sera calculé une fois que nous aurons nettoyé vos articles.*
                    </div>
                    <div class="total-section">
                        <div class="total-estime">Total Estimé: <span id="total">0 FCFA</span></div>
                    </div>

                </section>
                <form action="mode.php" method="post" class="btn"></form>
                <button class="enregistrer-btn">Enregistrer des services</button>

            </div>

    </section>

    </form>

    <div class="stage-section">
        <h2>Etape</h2>
        <ul id="stages">
            <li class="active">1. Planification</li>
            <li>2. Moyen de paiement</li>
            <li>3. Statut de la planification</li>
        </ul>
    </div>






    <script>
        // Mise à jour des sous-totaux et du total
        const prices = {
            'top': 200,
            'robe': 300,
            'veste': 500,
            'costume': 1000,
            'robe-mariage': 1500,
            'serviette': 500,
            'chaussures-standard': 500,
            'chaussures-dry': 700,
            'couette': 2000,
            'drap': 1000,
            'chemise': 250,
            'pantalon': 400,
            'jupe': 300,
            'rideau': 1500,
            'tapis': 2500
        };

        function updateSubtotal(id) {
            const input = document.getElementById(id);
            const value = parseInt(input.value);
            const subtotal = value * prices[id];
            document.getElementById(`subtotal-${id}`).textContent = `${subtotal} FCFA`;
        }

        function updateTotal() {
            let total = 0;
            Object.keys(prices).forEach(id => {
                const value = parseInt(document.getElementById(id).value);
                total += value * prices[id];
            });
            document.getElementById('total').textContent = `${total} FCFA`;
        }

        function increment(id) {
            const input = document.getElementById(id);
            let value = parseInt(input.value);
            if (value < 100) {
                input.value = value + 1;
                updateSubtotal(id);
                updateTotal();
            }
        }

        function decrement(id) {
            const input = document.getElementById(id);
            let value = parseInt(input.value);
            if (value > 0) {
                input.value = value - 1;
                updateSubtotal(id);
                updateTotal();
            }
        }

        // Carousel logic
        let currentSlide = 0;
        const carousel = document.getElementById('carousel');
        const cardWidth = 300; // Largeur d'une carte + gap (280 + 20)

        function slidePrev() {
            if (currentSlide > 0) {
                currentSlide--;
                carousel.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
            }
        }

        function slideNext() {
            const maxSlides = carousel.children.length - (Math.floor(carousel.parentElement.offsetWidth / cardWidth) || 1);
            if (currentSlide < maxSlides) {
                currentSlide++;
                carousel.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
            }
        }
    </script>
</body>

</html>