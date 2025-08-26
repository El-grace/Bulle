<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laverie - Tarifs et Sélection d'Articles</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f8f8f8;
    }

    h1,
    h2 {
      text-align: center;
      color: #333;
    }

    /* Section Tarifs - Adaptée en carousel horizontal */
    .tarifs-section {
      margin-bottom: 40px;
    }

    .tarifs-carousel {
      position: relative;
      overflow: hidden;
    }

    .tarifs-cards {
      display: flex;
      transition: transform 0.5s ease;
      gap: 20px;
    }

    .tarif-card {
      min-width: 280px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: center;
    }

    .tarif-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .icon {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin: 0 auto 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 40px;
      color: white;
    }

    .icon-blue {
      background-color: #00aaff;
    }

    .icon-green {
      background-color: #00cc88;
    }

    .title {
      font-size: 1.2em;
      margin: 0 0 10px;
      color: #333;
    }

    .desc {
      font-size: 0.9em;
      color: #666;
      margin: 0 0 10px;
    }

    .subtitle {
      font-size: 0.8em;
      color: #999;
      display: block;
      margin: 0 0 15px;
    }

    .price-block {
      background-color: #e6f7ff;
      border-radius: 4px;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.9em;
      color: #333;
    }

    .price-block.blue {
      background-color: #007bff;
      color: white;
    }

    .price-block .arrow {
      font-size: 1.2em;
      font-weight: bold;
    }

    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      z-index: 10;
    }

    .prev {
      left: 0;
    }

    .next {
      right: 0;
    }

    /* Section Articles */
    .articles-section {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .article-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 0;
      border-bottom: 1px solid #eee;
      transition: background-color 0.3s;
    }

    .article-item:hover {
      background-color: #f0f0f0;
    }

    .article-item:last-child {
      border-bottom: none;
    }

    .article-name {
      flex: 1;
      font-weight: bold;
    }

    .counter {
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    .counter button {
      background-color: #f0f0f0;
      color: #333;
      border: 1px solid #ddd;
      padding: 8px 12px;
      cursor: pointer;
      font-size: 16px;
      border-radius: 4px;
      transition: background-color 0.3s;
      margin: 0 5px;
    }

    .counter button:hover {
      background-color: #ddd;
    }

    .counter input {
      width: 50px;
      text-align: center;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 8px;
      font-size: 16px;
    }

    .subtotal {
      font-weight: bold;
      color: #007bff;
      min-width: 100px;
      text-align: right;
    }

    .total-section {
      margin-top: 20px;
      text-align: right;
    }

    .info-message {
      background-color: #fffbe6;
      border: 1px solid #ffe58f;
      border-radius: 4px;
      padding: 10px;
      margin: 20px 0;
      font-size: 0.9em;
      color: #d48806;
      text-align: center;
    }

    .total-estime {
      font-size: 1.2em;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .enregistrer-btn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 15px 20px;
      font-size: 1.1em;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s;
    }

    .enregistrer-btn:hover {
      background-color: #0056b3;
    }

    /* Responsivité */
    @media (max-width: 600px) {
      .tarif-card {
        min-width: 100%;
      }

      .tarifs-cards {
        gap: 10px;
      }

      .article-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .counter {
        margin: 10px 0;
      }

      .subtotal {
        text-align: left;
      }

      .total-section {
        text-align: left;
      }
    }
  </style>
</head>

<body>
  <h1>Laverie en Ligne</h1>

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
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 200 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-green">👗</div>
          <h3 class="title">Robe</h3>
          <p class="desc">Pour les robes simples et élégantes.</p>
          <small class="subtitle">pressing + repassage</small>
          <div class="price-block blue">
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 300 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-blue">🧥</div>
          <h3 class="title">Veste</h3>
          <p class="desc">Pour les vestes et manteaux légers.</p>
          <small class="subtitle">nettoyage délicat</small>
          <div class="price-block blue">
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 500 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-green">👔</div>
          <h3 class="title">Costume</h3>
          <p class="desc">Pour les costumes complets et formels.</p>
          <small class="subtitle">pressing + sur cintres</small>
          <div class="price-block blue">
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 1000 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-blue">👰</div>
          <h3 class="title">Robe de Mariage</h3>
          <p class="desc">Pour les robes de mariage délicates et volumineuses.</p>
          <small class="subtitle">nettoyage personnalisé</small>
          <div class="price-block blue">
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 1500 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-green">🛁</div>
          <h3 class="title">Serviette</h3>
          <p class="desc">Pour les serviettes et linges de bain.</p>
          <small class="subtitle">laver + sécher</small>
          <div class="price-block blue">
            <span>PRIX PAR ARTICLE</span>
            <span>à partir de 500 FCFA</span>
            <span class="arrow">></span>
          </div>
        </div>
        <div class="tarif-card">
          <div class="icon icon-blue">👞</div>
          <h3 class="title">Chaussures (Nettoyage Standard)</h3>
          <p class="desc">Pour les chaussures quotidiennes.</p>
          <small class="subtitle">nettoyage standard</small>
          <div class="price-block blue">
            <span>PRIX PAR PAIRE</span>
            <span>à partir de 500 FCFA</span>
            <span class="arrow">></span>
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
        <span class="article-name">Top</span>
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
      <span class="star">*</span> L'estimation n'est fournie qu'à titre d'information. Le prix final sera calculé une fois que nous aurons nettoyé vos articles.
    </div>
    <div class="total-section">
      <div class="total-estime">Total Estimé: <span id="total">0 FCFA</span></div>
    </div>
    <button class="enregistrer-btn">ENREGISTRER DES SERVICES</button>
  </section>

  <script>
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