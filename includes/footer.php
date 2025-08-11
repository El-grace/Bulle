 <!DOCTYPE html>

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
     <title>footer</title>
 </head>
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
     }

     * {
         margin: 0 !important;
         padding: 0;
         box-sizing: border-box;
         font-family: var(--font);
         /* background: var(--color3); */
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



     .footer {
         padding: 80px;

         background:
             radial-gradient(circle at top left, white, transparent 40%),
             radial-gradient(circle at top right, white, transparent 70%),
             var(--color3);
         color: var(--color2);
         display: flex;
         gap: 20px;
     }

     .footer-column {
         flex: 1;
         min-width: 200px;
     }

     .footer-column h3 {
         font-size: 16px;
         color: var(--color1);
     }

     .footer-column ul {
         list-style: none;
         padding: 15px 0;
     }

     .footer-column ul li {
         margin-bottom: 70px;

     }

     .footer-column ul li a {
         color: var(--color2);
         text-decoration: none;
         font-size: 14px;
         gap: 30px;
     }

     .footer-column ul li a:hover {
         color: var(--color1);
     }

     .social-icons {
         margin-top: 15px;
     }

     .social-icons a {
         color: var(--color);
         font-size: 20px;
         margin-right: 10px;
         text-decoration: none;
     }

     .profile-img {
         width: 40px;
         height: 40px;
         border-radius: 50%;
         overflow: hidden;
         margin-left: 20px;
     }

     .profile-img img {
         width: 100%;
         height: auto;
     }

     footer {
         background-color: var(--color2);
         color: #fff;
         display: flex;
         justify-content: center;
         padding: 8px;
     }

     footer a {
         color: #fff;
         text-decoration: none;
         font-weight: bold;
     }

     .chatbot {
         position: fixed;
         bottom: 20px;
         right: 20px;
         width: 60px;
         height: 60px;
         background: var(--color1);
         border-radius: 50%;
         display: flex;
         align-items: center;
         justify-content: center;
         cursor: pointer;
         box-shadow: 0 4px 15px rgba(14, 111, 223, 0.3);
         transition: transform 0.3s ease;
     }

     .chatbot:hover {
         transform: scale(1.1);
     }

     .chatbot i {
         color: white;
         font-size: 1.5rem;
     }

     @keyframes fadeIn {
         from {
             opacity: 0;
         }

         to {
             opacity: 1;
         }
     }

     @keyframes slideIn {
         from {
             transform: translateX(-100%);
         }

         to {
             transform: translateX(0);
         }
     }

     @keyframes slideUp {
         from {
             transform: translateY(50px);
             opacity: 0;
         }

         to {
             transform: translateY(0);
             opacity: 1;
         }
     }

     @keyframes scaleIn {
         from {
             transform: scale(0.9);
             opacity: 0;
         }

         to {
             transform: scale(1);
             opacity: 1;
         }
     }

     @keyframes fadeInUp {
         from {
             transform: translateY(20px);
             opacity: 0;
         }

         to {
             transform: translateY(0);
             opacity: 1;
         }
     }

     @keyframes slideInLeft {
         from {
             transform: translateX(-100%);
             opacity: 0;
         }

         to {
             transform: translateX(0);
             opacity: 1;
         }
     }

     @keyframes scroll {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(-100%);
         }
     }

     @keyframes scrollAvis {
         0% {
             transform: translateX(0);
         }

         100% {
             transform: translateX(-100%);
         }
     }
 </style>

 <body>

     <div class="footer">
         <div class="footer-column">
             <h3>Description</h3>
             <p></p>
             <div class="social-icons">
                 <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                 <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                 <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                 <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
             </div>

         </div>
         <div class="footer-column">
             <h3>Services pris en compte</h3>
             <ul>
                 <li><a href="#">Carte de fidélité</a></li>
                 <li><a href="#">Désinfection</a></li>
                 <li><a href="#">Lavage de linge</a></li>
                 <li><a href="#">Paiement sécurisé</a></li>
                 <li><a href="#">Suivi de commande</a></li>
                 <li><a href="#">Services de collecte et livraison</a></li>
             </ul>
         </div>
         <div class="footer-column">
             <h3>Planifiez</h3>
             <ul>
                 <li><a href="#">Trouver une laverie</a></li>
                 <li><a href="#">Réserver un service</a></li>
                 <li><a href="#">Créer un compte</a></li>
                 <li><a href="#">Planifier un lavage</a></li>
             </ul>
         </div>

         <div class="footer-column">
             <h3>Tout sur nous</h3>
             <ul>
                 <li><a href="#">Qui sommes-nous ?</a></li>
                 <li><a href="#">Carte de fidélité</a></li>
                 <li><a href="#">Codes promo</a></li>
                 <li><a href="#">Programme de formation</a></li>
             </ul>
         </div>

         <div class="footer-column">
             <h3>Assistance</h3>
             <ul>
                 <li><a href="#">Centre d'aide</a></li>
                 <li><a href="#">Signaler un problème</a></li>
                 <li><a href="#">Voir la démo</a></li>
                 <li><a href="#">Politique de confidentialité</a></li>
             </ul>
         </div>

     </div>
     <footer>
         <div class="footer-content">
             <p>© 2025 Bulle - Tous droits réservés
                 Conçu par <a href="https://www.linkedin.com/">bulle</a></p>
         </div>

     </footer>



     <div class="chatbot" onclick="toggleChat()">
         <i class="fas fa-comment"></i>
     </div>
     <div id="chatWindow" class="chat-window" style="display: none; position: fixed; bottom: 90px; right: 20px; width: 300px; height: 400px; background: white; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.2); padding: 10px;">
         <div style="text-align: right;"><button onclick="toggleChat()">Fermer</button></div>
         <div id="chatMessages" style="height: 340px; overflow-y: auto; padding: 10px;">
             <p><strong>Bulle Bot:</strong> Bonjour! Comment puis-je vous aider aujourd'hui?</p>
         </div>
         <input type="text" id="chatInput" style="width: 100%; padding: 5px; margin-top: 10px;" placeholder="Tapez votre message...">
         <button onclick="sendMessage()" style="padding: 5px 10px; background: var(--color1); color: white; border: none; border-radius: 5px; cursor: pointer;">Envoyer</button>
     </div>



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

     </html>