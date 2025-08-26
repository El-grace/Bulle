document.addEventListener('DOMContentLoaded', function() {
    const updateDashboardStats = () => {
        console.log("Mise à jour des statistiques du tableau de bord");
        const cards = document.querySelectorAll('.dashboard-card');
        cards.forEach(card => {
            card.classList.add('animated-bg');
            setTimeout(() => {
                card.classList.remove('animated-bg');
            }, 2000);
        });
    };

    setInterval(updateDashboardStats, 30000);

    document.querySelectorAll('.machine-card').forEach(card => {
        card.addEventListener('click', function() {
            console.log("Ouvrir les détails de la machine ", this.dataset.machineId);
        });
    });

    document.querySelectorAll('.maintenance-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const machineId = this.dataset.machineId;
            if (confirm(`Mettre la machine ${machineId} en maintenance?`)) {
                console.log(`Machine ${machineId} mise en maintenance`);
                const card = this.closest('.machine-card');
                card.querySelector('.status-badge').classList.remove('bg-success', 'text-success');
                card.querySelector('.status-badge').classList.add('bg-warning', 'text-warning');
                card.querySelector('.status-text').textContent = 'Maintenance';
            }
        });
    });

    document.querySelectorAll('.reserve-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const machineId = this.dataset.machineId;
            console.log(`Réservation de la machine ${machineId}`);
        });
    });

    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            console.log(`Recherche: ${searchTerm}`);
        });
    }

    document.querySelectorAll('.pagination-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const page = this.dataset.page;
            console.log(`Chargement de la page ${page}`);
        });
    });

    document.querySelectorAll('[data-tooltip]').forEach(el => {
        el.addEventListener('mouseenter', function() {
            console.log(`Affichage du tooltip: ${this.dataset.tooltip}`);
        });
    });
});