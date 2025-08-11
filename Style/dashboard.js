// Simulation de données dynamiques (à remplacer par des appels API si besoin)
let commandes = [
    { statut: 'en cours', client: 'Jean Dupont', date_heure: '2025-08-07 14:30', type_service: 'lavage', statut_livraison: 'en attente' },
    { statut: 'livré', client: 'Marie Leclerc', date_heure: '2025-08-06 10:15', type_service: 'repassage', statut_livraison: 'livré' },
    { statut: 'en attente', client: 'Pierre Martin', date_heure: '2025-08-08 09:00', type_service: 'livraison', statut_livraison: 'en cours' }
];

// Fonction pour mettre à jour la liste des commandes
function updateCommandes() {
    const commandesList = document.querySelector('.commandes-list');
    commandesList.innerHTML = '';
    commandes.forEach(cmd => {
        const item = document.createElement('div');
        item.className = 'commande-item';
        item.innerHTML = `
            <span class="label">Statut :</span> <span class="value">${cmd.statut}</span>
            <span class="label">Client :</span> <span class="value">${cmd.client}</span>
            <span class="label">Date/Heure :</span> <span class="value">${cmd.date_heure}</span>
            <span class="label">Type de Service :</span> <span class="value">${cmd.type_service}</span>
            <span class="label">Statut Livraison :</span> <span class="value">${cmd.statut_livraison}</span>
        `;
        commandesList.appendChild(item);
    });
}

// Simulation de mises à jour en temps réel (exemple)
setInterval(() => {
    commandes.push({ statut: 'en cours', client: 'Nouvel Client', date_heure: new Date().toISOString().slice(0, 16).replace('T', ' '), type_service: 'lavage', statut_livraison: 'en attente' });
    updateCommandes();
}, 5000); // Mise à jour toutes les 5 secondes (pour démonstration)

document.addEventListener('DOMContentLoaded', updateCommandes);