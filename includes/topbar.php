<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>topbar</title>
    <style>
        :root {
            --color1: #0E6FDF;
            --color2: #092E63;
            --color3: #EEF6FF;
            --color4: #F9F8FD;
            --font: 'Work Sans', sans-serif;
        }

        body {
            font-family: var(--font);
            box-sizing: border-box;
            margin: 0;
            padding-top: 110px;
        }

        * {
            box-sizing: border-box;
            font-family: var(--font);
        }

        a {
            text-decoration: none;
            color: black;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.5;
            text-align: justify;
            padding: 20px 0;
        }

        header {
            position: relative;
            overflow: hidden;

        }

        .annonce {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--color2);
            z-index: 1001;
            text-align: center;
        }

        .annonce p {
            text-align: center;

            color: white;
            margin: 0;
            font-size: 1rem;
            padding: 10px;
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        nav {
            position: fixed;
            top: 40px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: background 0.3s, padding 0.3s;
        }

        nav.scrolled {
            padding: 0.5rem 2rem;
            background: var(--color3);
        }

        .logo {
            width: 100px;
            height: 70px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .logo img {
            min-width: 100%;
            transition: transform 0.3s;
        }

        .logo:hover img {
            transform: scale(1.1);
        }

        .menu {
            width: 55%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu a {
            text-decoration: none;
        }

        .menu a:hover {
            color: var(--color1);
        }

        .menu a.active {
            color: var(--color2);
        }

        button {
            border: none;
            padding: 10px 30px;
            background: var(--color1);
            color: white;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: var(--color2);
            transform: scale(1.05);
        }

        main {
            margin-top: 20px;
            /* Marge supplémentaire pour éviter que le contenu ne soit trop près de nav */
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <div class="annonce">
            <p>Votre 11ᵉ lavage offert grâce à notre carte de fidélité Landrylessive.</p>
        </div>
        <nav>
            <div class="logo">
                <img src="images/logobulle.png" alt="logo">
            </div>
            <div class="menu">
                <a href="index.php">Accueil</a>
                <a href="laveries.php">Laveries</a>
                <a href="planification.php">Planification</a>
                <a href="contact.php">Contact</a>
            </div>
            <button type="submit">Se connecter</button>
        </nav>
    </header>
    <main>

    </main>
    <script>
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>