<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Inscription Gérant - Bulle</title>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="images/emballeur.png" alt="">
        </div>
        <div class="form-section">
            <div class="step-indicator">
                Étape 4 Vérification OTP
            </div>
            <form action="se_connecter.php" method="POST">

                <div class="ottp">
                    <p>Créez votre espace professionnel</p>

                    <div class="otp-inputs">
                        <input type="text" class="otp-input" maxlength="1" placeholder="">
                        <input type="text" class="otp-input" maxlength="1" placeholder="">
                        <input type="text" class="otp-input" maxlength="1" placeholder="">
                        <input type="text" class="otp-input" maxlength="1" placeholder="">
                    </div>
                    <div class="resend">
                        <span id="timer-text">Code expire dans <span id="timer" class="timer">30</span> secondes.</span>
                        <a id="resend-link" class="hidden" href="#">Renvoyer le code</a>
                    </div>
                    <button class="button">Valider</button>
                </div>

            </form>
        </div>
        </form>

    </div>
    <script>
        const inputs = document.querySelectorAll('.otp-input');
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        let timeLeft = 30;
        const timerElement = document.getElementById('timer');
        const timerText = document.getElementById('timer-text');
        const resendLink = document.getElementById('resend-link');

        const countdown = setInterval(() => {
            timeLeft--;
            timerElement.textContent = timeLeft;
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerText.classList.add('hidden');
                resendLink.classList.remove('hidden');
            }
        }, 1000);

        resendLink.addEventListener('click', (e) => {
            e.preventDefault();
            // Logique pour renvoyer le code (simulée)
            alert('Code renvoyé !');
            timeLeft = 30;
            timerElement.textContent = timeLeft;
            timerText.classList.remove('hidden');
            resendLink.classList.add('hidden');
            const newCountdown = setInterval(() => {
                timeLeft--;
                timerElement.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(newCountdown);
                    timerText.classList.add('hidden');
                    resendLink.classList.remove('hidden');
                }
            }, 1000);
        });
    </script>


</body>

</html>