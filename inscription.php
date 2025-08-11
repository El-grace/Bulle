<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inscription - Bulle</title>
</head>

<body>
    <div class="container">
        <div class="slider">
            <div class="slides" id="slides">
                <div class="slide"><img src="images/client_dame.jpg" alt="Slide 1"></div>
                <div class="slide"><img src="images/livreur2.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="images/livreur.jpg" alt="Slide 3"></div>
            </div>
            <div class="slider-nav" id="slider-nav">
                <span class="active" onclick="currentSlide(1)"></span>
                <span onclick="currentSlide(2)"></span>
                <span onclick="currentSlide(3)"></span>
            </div>
        </div>
        <form action="index.php" class="form-section">
            <div class="form-group"><input type="text" placeholder="Nom" required></div>
            <div class="form-group"><input type="text" placeholder="Prénom" required></div>
            <div class="form-group"><input type="text" placeholder="Adresse" required></div>
            <div class="form-group"><input type="text" placeholder="Contact" required></div>
            <div class="form-group"><input type="password" placeholder="Mot de passe" required></div>
            <div class="form-group"><input type="password" placeholder="Confirmer le mot de passe" required></div>
            <div class="terms">
                <input type="radio" name="terms" id="terms" required>
                <label for="terms">J'accepte toutes les conditions</label>
            </div>
            <div>
                <button>S'inscrire</button>
                <div class="login-text">Vous avez déjà un compte ? <a href="se_connecter.php">Se connecter</a></div>
            </div>
        </form>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let slides = document.getElementById("slides");
            let dots = document.getElementById("slider-nav").getElementsByTagName("span");
            if (n > 3) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = 3
            }
            slides.style.transform = `translateX(-${(slideIndex - 1) * 100}%)`;
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[slideIndex - 1].className += " active";
        }

        setInterval(() => {
            showSlides(slideIndex += 1);
        }, 5000);
    </script>
</body>

</html>