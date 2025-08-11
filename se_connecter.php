<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style/se_connecter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Bienvenue sur Bulle</title>
</head>

<body>
  <div class="login">
    <div class="imge">
      <img src="images/logobulle.png" class="img-logo" alt="Logo Bulle">
    </div>
    <div class="subtext">Connectez-vous à votre compte</div>
    <form action="index.php" method="post">
      <input type="email" placeholder="Adresse e-mail" required>
      <input type="password" placeholder="Mot de passe" required>
      <div class="btn">
        <button type="submit">Se connecter</button>
        <div class="forgot-password"><a href="#">Mot de passe oublié ?</a></div>
        <div class="signup-text">Pas de compte ?
          <a href="inscription.php">S'inscrire</a> ou
        </div>
        <div class="google-button">
          <img src="https://www.google.com/favicon.ico" alt="Google Logo">
          S'inscrire avec Google
        </div>
      </div>
    </form>

  </div>
</body>

</html>