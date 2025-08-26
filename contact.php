<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Inscription Gérant - Bulle</title>
</head>

<body>
    <header>
        <?php
        include("includes/topbar.php");
        ?>
        <form action="#" method="post" class="formulaire">
            <h2>Nous contacter</h2>
            <div class="form">
                <div>
                    <label for="name"></label>
                    <input type="text" placeholder="Votre nom complet" id="name">
                </div>
                <div>
                    <label for="email"></label>
                    <input type="email" placeholder="Votre email" id="email">
                </div>
                <div class="textarea">
                    <label for="message" "></label>
                    <textarea></textarea>
                </div>
            </div>
            <button type=" submit" class="butn" "> Envoyer</button>
        </form>
</body>

</html>
<?php
include("includes/footer.php");
?>