// Données des quartiers (coordonnées fictives)
const districts = {
    'siporex': { lat: 5.339, lng: -4.059 },
    'toit-rouge': { lat: 5.340, lng: -4.060 },
    'niangon': { lat: 5.345, lng: -4.065 },
    'anador': { lat: 5.360, lng: -4.070 }
};

// Gestion du filtre
const filterIcon = document.querySelector('.filter-icon');
const filterMenu = document.querySelector('.filter-menu');
const filterOptions = document.querySelectorAll('.filter-menu div');
const searchInput = document.getElementById('searchInput');
const districtSelect = document.getElementById('districtSelect');
const laundryList = document.querySelectorAll('.laundry');
const laundryDesItems = document.querySelectorAll('.laundry_des');
let currentFilter = null;

// Associer chaque .laundry à un .laundry_des par data-name
const laundryMap = new Map();
laundryList.forEach(laundry => {
    const name = laundry.dataset.name;
    const matchingDes = Array.from(laundryDesItems).find(des => des.dataset.name === name);
    if (matchingDes) laundryMap.set(name, matchingDes);
});

filterIcon.addEventListener('click', () => {
    filterMenu.classList.toggle('active');
});

filterOptions.forEach(option => {
    option.addEventListener('click', () => {
        currentFilter = option.dataset.filter;
        filterMenu.classList.remove('active');
        districtSelect.classList.toggle('active', currentFilter === 'district');
        filterAndUpdate();
    });
});

// Calcul de la distance (formule de Haversine)
function getDistance(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

// Fonction pour envoyer les données de recherche au backend (optionnel, si tu veux garder cette fonctionnalité)
async function saveSearch(searchTerm, filterType, district) {
    try {
        const response = await fetch('save_search.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `search_term=${encodeURIComponent(searchTerm)}&filter_type=${encodeURIComponent(filterType)}&district=${encodeURIComponent(district)}`
        });
        const result = await response.json();
        if (result.status !== 'success') console.warn('Échec de l\'enregistrement');
    } catch (error) {
        console.error('Erreur:', error);
    }
}

// Fonction de filtrage
async function filterLaundries() {
    const query = searchInput.value.toLowerCase().trim();
    const district = districtSelect.value;
    const filteredNames = new Set();

    if (!currentFilter && !query) {
        laundryList.forEach(laundry => laundry.style.display = 'none');
        return filteredNames;
    }

    for (const laundry of laundryList) {
        const name = laundry.dataset.name.toLowerCase();
        const districtData = laundry.dataset.district;
        const lat = parseFloat(laundry.dataset.lat);
        const lng = parseFloat(laundry.dataset.lng);
        let show = false;

        if (query) {
            show = name.includes(query) || districtData.includes(query);
        } else if (currentFilter === 'all') {
            show = true;
        }

        if (currentFilter === 'district' && district) {
            const districtCoords = districts[district];
            if (districtCoords) {
                const distance = getDistance(lat, lng, districtCoords.lat, districtCoords.lng);
                show = districtData === district && distance <= 1;
            } else {
                show = districtData === district;
            }
        } else if (currentFilter === 'nearby') {
            if (navigator.geolocation) {
                try {
                    const position = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(resolve, reject);
                    });
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    const distance = getDistance(userLat, userLng, lat, lng);
                    show = distance <= 10 && (query ? (name.includes(query) || districtData.includes(query)) : true);
                } catch (error) {
                    console.warn("Géolocalisation échouée :", error);
                    show = false;
                }
            } else {
                show = false;
            }
        }

        if (show) {
            laundry.style.display = 'block';
            filteredNames.add(name);
        } else {
            laundry.style.display = 'none';
        }
    }
    return filteredNames;
}

// Mettre à jour la section info-laundry
function updateLaundryDes(filteredNames) {
    laundryDesItems.forEach(item => {
        const name = item.dataset.name.toLowerCase();
        item.style.display = filteredNames.has(name) ? 'block' : 'none';
    });
}

// Fonction combinée
async function filterAndUpdate() {
    const query = searchInput.value.toLowerCase().trim();
    const district = districtSelect.value;
    await saveSearch(query, currentFilter || '', district);
    const filteredNames = await filterLaundries();
    updateLaundryDes(filteredNames);
    updateDisplay();
}

// Événements
searchInput.addEventListener('input', filterAndUpdate);
districtSelect.addEventListener('change', filterAndUpdate);


// Gestion du carrousel
const slide = document.querySelector('.slide');
const images = document.querySelectorAll('.slide img');
let carouselIndex = 0;
const totalImages = images.length;

function showSlide(index) {
    if (index >= totalImages) carouselIndex = 0;
    else if (index < 0) carouselIndex = totalImages - 1;
    else carouselIndex = index;
    slide.style.transform = `translateX(-${carouselIndex * 100 / totalImages}%)`;
}

let autoSlide = setInterval(() => showSlide(carouselIndex + 1), 3000);

document.querySelector('.prev-btn').addEventListener('click', () => {
    clearInterval(autoSlide);
    showSlide(carouselIndex - 1);
    autoSlide = setInterval(() => showSlide(carouselIndex + 1), 3000);
});

document.querySelector('.next-btn').addEventListener('click', () => {
    clearInterval(autoSlide);
    showSlide(carouselIndex + 1);
    autoSlide = setInterval(() => showSlide(carouselIndex + 1), 3000);
});

// Pagination
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const pageInfo = document.getElementById('pageInfo');
let paginationIndex = 0;
const itemsPerPage = 5;

function updateDisplay() {
    let visibleItems = 0;
    laundryDesItems.forEach((item, index) => {
        if (item.style.display !== 'none') visibleItems++;
        item.classList.add('hidden');
        if (index >= paginationIndex && index < paginationIndex + itemsPerPage && item.style.display !== 'none') {
            item.classList.remove('hidden');
            setTimeout(() => item.classList.add('visible'), 10);
        } else {
            item.classList.remove('visible');
        }
    });
    const visiblePages = Math.ceil(visibleItems / itemsPerPage);
    pageInfo.textContent = `Page ${Math.floor(paginationIndex / itemsPerPage) + 1} sur ${visiblePages || 1}`;
    prevBtn.disabled = paginationIndex === 0;
    nextBtn.disabled = paginationIndex + itemsPerPage >= visibleItems || visibleItems <= itemsPerPage;
}

prevBtn.addEventListener('click', () => {
    if (paginationIndex > 0) {
        paginationIndex -= itemsPerPage;
        updateDisplay();
    }
});

nextBtn.addEventListener('click', () => {
    let visibleItems = Array.from(laundryDesItems).filter(item => item.style.display !== 'none').length;
    if (paginationIndex + itemsPerPage < visibleItems) {
        paginationIndex += itemsPerPage;
    } else {
        paginationIndex = 0;
    }
    updateDisplay();
});

updateDisplay();