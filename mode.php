<script type="text/javascript">
    var gk_isXlsx = false;
    var gk_xlsxFileLookup = {};
    var gk_fileData = {};

    function filledCell(cell) {
        return cell !== '' && cell != null;
    }

    function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], {
                    type: 'base64'
                });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, {
                    header: 1,
                    blankrows: false,
                    defval: ''
                });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                    row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                    headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, {
                    header: 1
                });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
    }
</script>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style//planif_etp2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
        </div>
        <!-- Barre de progression -->
        <div class="progress-bar" role="progressbar" aria-label="Étapes du paiement">
            <div class="progress-step active" id="step1"></div>
            <div class="progress-step" id="step2"></div>
            <div class="progress-step" id="step3"></div>
            <div class="progress-step" id="step4"></div>
        </div>
        <!-- Écran 1 : Choix du mode de paiement -->
        <div id="screen1" class="screen" role="region" aria-label="Choix du mode de paiement">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Choisissez votre mode de paiement</h2>
            <div class="grid gap-4">
                <button onclick="selectOperator('Wave')" class="operator-btn bg-blue-50 p-4 rounded-lg flex items-center gap-3 hover:bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <span class="text-blue-600 font-semibold">Wave</span>
                </button>
                <button onclick="selectOperator('Moov Money')" class="operator-btn bg-blue-50 p-4 rounded-lg flex items-center gap-3 hover:bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="4" width="16" height="16" />
                    </svg>
                    <span class="text-blue-600 font-semibold">Moov Money</span>
                </button>
                <button onclick="selectOperator('Orange Money')" class="operator-btn bg-blue-50 p-4 rounded-lg flex items-center gap-3 hover:bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 110 20 10 10 0 010-20z" />
                    </svg>
                    <span class="text-blue-600 font-semibold">Orange Money</span>
                </button>
                <button onclick="selectOperator('MTN Money')" class="operator-btn bg-blue-50 p-4 rounded-lg flex items-center gap-3 hover:bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z" />
                    </svg>
                    <span class="text-blue-600 font-semibold">MTN Money</span>
                </button>
                <button onclick="selectOperator('Carte Visa')" class="operator-btn bg-blue-50 p-4 rounded-lg flex items-center gap-3 hover:bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="8" width="16" height="8" />
                    </svg>
                    <span class="text-blue-600 font-semibold">Carte Visa</span>
                </button>
            </div>
            <button id="continueBtn" disabled class="mt-6 w-full bg-blue-500 text-white p-3 rounded-lg opacity-50 cursor-not-allowed hover:bg-blue-600 transition-colors" onclick="showScreen('screen2')">Continuer</button>
        </div>

        <!-- Écran 2 : Saisie des informations -->
        <div id="screen2" class="screen hidden" role="region" aria-label="Saisie des informations">
            <h2 id="screen2Title" class="text-2xl font-bold mb-4 text-center text-gray-800">Dépôt via <span id="operatorName"></span></h2>
            <div id="mobileFields" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                    <input id="phoneNumber" type="tel" pattern="[0-9]{10}" placeholder="07XXXXXXXX" class="w-full p-2 border rounded-lg transition-all" required>
                    <p class="error-message">Veuillez entrer un numéro valide (10 chiffres).</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Montant du dépôt (FCFA)</label>
                    <input id="amount" type="number" min="100" placeholder="5000" class="w-full p-2 border rounded-lg transition-all" required>
                    <p class="error-message">Le montant doit être supérieur à 100 FCFA.</p>
                </div>
            </div>
            <div id="visaFields" class="space-y-4 hidden">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro de carte</label>
                    <input id="cardNumber" type="text" pattern="[0-9]{16}" placeholder="1234 5678 9012 3456" class="w-full p-2 border rounded-lg transition-all" required>
                    <p class="error-message">Veuillez entrer un numéro de carte valide (16 chiffres).</p>
                </div>
                <div class="flex gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Expiration</label>
                        <input id="cardExpiry" type="text" pattern="(0[1-9]|1[0-2])/[0-9]{2}" placeholder="MM/AA" class="w-full p-2 border rounded-lg transition-all" required>
                        <p class="error-message">Format : MM/AA (ex. 12/25).</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">CVV</label>
                        <input id="cardCVV" type="text" pattern="[0-9]{3}" placeholder="123" class="w-full p-2 border rounded-lg transition-all" required>
                        <p class="error-message">CVV : 3 chiffres.</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 mt-6">
                <button class="w-1/2 bg-gray-200 text-gray-700 p-3 rounded-lg hover:bg-gray-300 transition-colors" onclick="showScreen('screen1')">Changer</button>
                <button id="validateBtn" class="w-1/2 bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition-colors" onclick="validateInputs()">Valider</button>
            </div>
        </div>

        <!-- Écran 3 : Récapitulatif -->
        <div id="screen3" class="screen hidden" role="region" aria-label="Récapitulatif">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Vérifiez vos informations</h2>
            <div class="bg-gray-50 p-4 rounded-lg mb-4 border border-gray-200">
                <p><strong>Moyen de paiement :</strong> <span id="summaryOperator"></span></p>
                <p id="summaryPhone"><strong>Numéro :</strong> <span id="summaryPhoneValue"></span></p>
                <p id="summaryCard" class="hidden"><strong>Carte :</strong> <span id="summaryCardValue"></span></p>
                <p><strong>Montant :</strong> <span id="summaryAmount"></span> FCFA</p>
            </div>
            <div class="flex gap-4">
                <button class="w-1/2 bg-gray-200 text-gray-700 p-3 rounded-lg hover:bg-gray-300 transition-colors" onclick="showScreen('screen2')">Modifier</button>
                <button class="w-1/2 bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition-colors" onclick="showScreen('screen4')">Confirmer</button>
            </div>
        </div>

        <!-- Écran 4 : Confirmation et redirection -->
        <div id="screen4" class="screen hidden" role="region" aria-label="Confirmation du paiement">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Paiement en cours</h2>
            <div class="bg-gray-50 p-4 rounded-lg mb-4 text-center border border-gray-200">
                <p>Composez : <strong id="ussdCode"></strong></p>
                <p>pour confirmer le dépôt de <span id="finalAmount"></span> FCFA</p>
                <p>sur <span id="finalPhone"></span> via <span id="finalOperator"></span>.</p>
            </div>
            <button class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition-colors" onclick="redirectToPayment()">Rediriger</button>
        </div>
    </section>
    <div class="stage-section">
        <h2>Etape</h2>
        <ul id="stages">
            <li>1. Planification</li>
            <li class="active">2. Moyen de paiement</li>
            <li>3. Statut de la planification</li>
        </ul>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let selectedOperator = '';
            let phoneNumber = '';
            let amount = '';
            let cardNumber = '';
            let cardExpiry = '';
            let cardCVV = '';

            window.selectOperator = function(operator) {
                selectedOperator = operator;
                const operatorName = document.getElementById('operatorName');
                const screen2Title = document.getElementById('screen2Title');
                const continueBtn = document.getElementById('continueBtn');
                const mobileFields = document.getElementById('mobileFields');
                const visaFields = document.getElementById('visaFields');

                if (operatorName && screen2Title && continueBtn && mobileFields && visaFields) {
                    operatorName.textContent = operator;
                    screen2Title.textContent = `Dépôt via ${operator}`;
                    continueBtn.disabled = false;
                    continueBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    mobileFields.classList.toggle('hidden', operator === 'Carte Visa');
                    visaFields.classList.toggle('hidden', operator !== 'Carte Visa');
                } else {
                    console.error('Un ou plusieurs éléments DOM sont introuvables.');
                }
            };

            window.showScreen = function(screenId) {
                document.querySelectorAll('.screen').forEach(screen => {
                    screen.classList.add('hidden');
                    screen.setAttribute('aria-hidden', 'true');
                });
                const targetScreen = document.getElementById(screenId);
                if (targetScreen) {
                    targetScreen.classList.remove('hidden');
                    targetScreen.setAttribute('aria-hidden', 'false');
                }

                // Gestion de la barre de progression
                document.querySelectorAll('.progress-step').forEach(step => step.classList.remove('active'));
                document.getElementById(`step${screenId.replace('screen', '')}`).classList.add('active');

                if (screenId === 'screen3') {
                    const summaryOperator = document.getElementById('summaryOperator');
                    const summaryPhone = document.getElementById('summaryPhone');
                    const summaryCard = document.getElementById('summaryCard');
                    const summaryPhoneValue = document.getElementById('summaryPhoneValue');
                    const summaryCardValue = document.getElementById('summaryCardValue');
                    const summaryAmount = document.getElementById('summaryAmount');

                    if (summaryOperator && summaryPhone && summaryCard && summaryPhoneValue && summaryCardValue && summaryAmount) {
                        summaryOperator.textContent = selectedOperator;
                        summaryPhone.classList.toggle('hidden', selectedOperator === 'Carte Visa');
                        summaryCard.classList.toggle('hidden', selectedOperator !== 'Carte Visa');
                        summaryPhoneValue.textContent = phoneNumber;
                        summaryCardValue.textContent = cardNumber ? `**** **** **** ${cardNumber.slice(-4)}` : '';
                        summaryAmount.textContent = amount;
                    }
                } else if (screenId === 'screen4') {
                    const ussdCode = document.getElementById('ussdCode');
                    const finalAmount = document.getElementById('finalAmount');
                    const finalPhone = document.getElementById('finalPhone');
                    const finalOperator = document.getElementById('finalOperator');

                    const ussdCodes = {
                        'Wave': '*155*4*1#',
                        'Moov Money': '*133*2#',
                        'Orange Money': '*144#',
                        'MTN Money': '*126#',
                        'Carte Visa': 'N/A'
                    };

                    if (ussdCode && finalAmount && finalPhone && finalOperator) {
                        ussdCode.textContent = ussdCodes[selectedOperator];
                        finalAmount.textContent = amount;
                        finalPhone.textContent = selectedOperator === 'Carte Visa' ? `carte ****${cardNumber.slice(-4)}` : phoneNumber;
                        finalOperator.textContent = selectedOperator;
                    }
                }
            };

            window.validateInputs = function() {
                const validateBtn = document.getElementById('validateBtn');
                validateBtn.classList.add('loading');
                setTimeout(() => {
                    validateBtn.classList.remove('loading');
                    if (selectedOperator === 'Carte Visa') {
                        cardNumber = document.getElementById('cardNumber').value;
                        cardExpiry = document.getElementById('cardExpiry').value;
                        cardCVV = document.getElementById('cardCVV').value;
                        amount = document.getElementById('amount').value;
                        if (!cardNumber.match(/^[0-9]{16}$/) || !cardExpiry.match(/^(0[1-9]|1[0-2])\/[0-9]{2}$/) || !cardCVV.match(/^[0-9]{3}$/) || amount < 100) {
                            shakeElement(document.getElementById('visaFields'));
                            alert('Veuillez remplir correctement tous les champs.');
                            return;
                        }
                    } else {
                        phoneNumber = document.getElementById('phoneNumber').value;
                        amount = document.getElementById('amount').value;
                        if (!phoneNumber.match(/^[0-9]{10}$/) || amount < 100) {
                            shakeElement(document.getElementById('mobileFields'));
                            alert('Veuillez remplir correctement tous les champs.');
                            return;
                        }
                    }
                    showScreen('screen3');
                }, 1000);
            };

            window.redirectToPayment = function() {
                const button = document.querySelector('#screen4 button');
                button.classList.add('loading');
                setTimeout(() => {
                    const ussdCode = document.getElementById('ussdCode')?.textContent;
                    if (selectedOperator === 'Carte Visa') {
                        window.location.href = 'https://payment-gateway-example.com';
                    } else if (ussdCode) {
                        window.location.href = `tel:${ussdCode}`;
                    }
                    button.classList.remove('loading');
                }, 1000);
            };

            function shakeElement(element) {
                if (element) {
                    element.style.animation = 'shake 0.3s';
                    setTimeout(() => element.style.animation = '', 300);
                }
            }

            // Animation de secousse pour les erreurs
            const style = document.createElement('style');
            style.textContent = `
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>

</html>