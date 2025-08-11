<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bd_laveries'; // Nom de ta base de données
$username = 'root'; // Par défaut dans XAMPP
$password = '';     // Par défaut dans XAMPP (vide)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Données des laveries extraites de ton HTML (codées en dur ici)
$laveries = [
    [
        'nom' => 'Laverie Magic Press Abobo',
        'address' => 'Abobo Avocatier, Abidjan',
        'lieu' => 'Abobo',
        'description' => 'Service de nettoyage et repassage rapide avec livraison possible à domicile.',
        'horaires' => '08:00 - 21:00 (Tous les jours)',
        'telephone' => '+225 07 58 44 22 11',
        'email' => 'magicpressci@gmail.com',
        'note' => 4.4,
        'nbre_note' => 95,
        'latitude' => 5.339,
        'longitude' => -4.059
    ],
    [
        'nom' => 'Laverie Top Clean Abobo',
        'address' => 'Abobo Baoulé, Abidjan',
        'lieu' => 'Abobo',
        'description' => 'Pressing professionnel pour habits et rideaux, prix abordables.',
        'horaires' => '07:30 - 20:00 (Lundi au Samedi)',
        'telephone' => '+225 01 01 01 01 01',
        'email' => 'topcleanabobo@gmail.com',
        'note' => 4.1,
        'nbre_note' => 60,
        'latitude' => 5.340,
        'longitude' => -4.060
    ],
    [
        'nom' => 'Laverie Shine Abobo',
        'address' => 'Abobo Sogefiha, Abidjan',
        'lieu' => 'Abobo',
        'description' => 'Spécialisée dans les vêtements délicats et les services express.',
        'horaires' => '08:00 - 20:30 (Tous les jours)',
        'telephone' => '+225 07 77 66 55 44',
        'email' => 'shineabobo@gmail.com',
        'note' => 4.3,
        'nbre_note' => 78,
        'latitude' => 5.345,
        'longitude' => -4.065
    ],
    [
        'nom' => 'Laverie Express Abobo Belleville',
        'address' => 'Abobo Belleville, Abidjan',
        'lieu' => 'Abobo',
        'description' => 'Laverie rapide avec options de séchage et pliage sur demande.',
        'horaires' => '08:00 - 20:00 (Tous les jours)',
        'telephone' => '+225 01 44 33 22 33',
        'email' => 'expressbelleville@gmail.com',
        'note' => 4.2,
        'nbre_note' => 88,
        'latitude' => 5.360,
        'longitude' => -4.070
    ],
    [
        'nom' => 'Laverie Pro-Net Abobo',
        'address' => 'Abobo Anador, Abidjan',
        'lieu' => 'Abobo',
        'description' => 'Pressing pro pour entreprises et particuliers, service client au top.',
        'horaires' => '09:00 - 19:30 (Lundi au Samedi)',
        'telephone' => '+225 05 03 03 03 03',
        'email' => 'pronetabobo@gmail.com',
        'note' => 4.0,
        'nbre_note' => 52,
        'latitude' => 5.339,
        'longitude' => -4.059
    ],
    [
        'nom' => 'Laverie SMH',
        'address' => 'Riviera Palmeraie, Abidjan',
        'lieu' => 'Riviera',
        'description' => 'Laverie moderne offrant un service rapide et soigné.',
        'horaires' => '08:00 - 20:00 (Tous les jours)',
        'telephone' => '+225 07 48 38 38 38',
        'email' => 'info@laverieexpress.ci',
        'note' => 4.5,
        'nbre_note' => 120,
        'latitude' => 5.340,
        'longitude' => -4.060
    ],
    [
        'nom' => 'Net Pressing Riviera',
        'address' => 'Riviera Bonoumin, Abidjan',
        'lieu' => 'Riviera',
        'description' => 'Service de pressing, repassage, livraison à domicile.',
        'horaires' => '07:30 - 21:00 (Lun - Sam)',
        'telephone' => '+225 07 47 76 34 35',
        'email' => 'contact@netpressing.ci',
        'note' => 4.3,
        'nbre_note' => 98,
        'latitude' => 5.345,
        'longitude' => -4.065
    ],
    [
        'nom' => 'Laverie Pro Clean',
        'address' => 'Angré Terminus 81, Abidjan',
        'lieu' => 'Angré',
        'description' => 'Spécialisée dans le lavage rapide et désinfection des vêtements.',
        'horaires' => '08:00 - 19:30 (Tous les jours)',
        'telephone' => '+225 07 07 07 70 70',
        'email' => 'procleanci@gmail.com',
        'note' => 4.6,
        'nbre_note' => 134,
        'latitude' => 5.360,
        'longitude' => -4.070
    ],
    [
        'nom' => 'Laverie Magic Clean',
        'address' => 'Cocody Danga, Abidjan',
        'lieu' => 'Cocody',
        'description' => 'Laverie et nettoyage à sec, services pour particuliers et entreprises.',
        'horaires' => '08:00 - 18:30 (Lun - Sam)',
        'telephone' => '+225 07 07 08 08 08',
        'email' => 'magicclean@ci.net',
        'note' => 4.2,
        'nbre_note' => 77,
        'latitude' => 5.339,
        'longitude' => -4.059
    ],
    [
        'nom' => 'Laverie Ciel Bleu',
        'address' => 'Zone 4, Rue du Canal, Abidjan',
        'lieu' => 'Zone 4',
        'description' => 'Laverie écologique et haut de gamme, livraison gratuite.',
        'horaires' => '09:00 - 20:00 (Tous les jours)',
        'telephone' => '+225 01 42 52 52 52',
        'email' => 'contact@cielbleu.ci',
        'note' => 4.8,
        'nbre_note' => 89,
        'latitude' => 5.340,
        'longitude' => -4.060
    ],
    [
        'nom' => 'Laverie Belle Pressing',
        'address' => 'Angré, Abidjan',
        'lieu' => 'Angré',
        'description' => 'Service haut de gamme pour vos vêtements délicats.',
        'horaires' => '09:00 - 19:00 (Lun - Sam)',
        'telephone' => '+225 07 07 07 07 07',
        'email' => 'bellepressing@gmail.com',
        'note' => 4.8,
        'nbre_note' => 95,
        'latitude' => 5.345,
        'longitude' => -4.065
    ],
    [
        'nom' => 'Laverie Speed Wash',
        'address' => 'Cocody Danga, Abidjan',
        'lieu' => 'Cocody',
        'description' => 'Lavage express avec livraison à domicile.',
        'horaires' => '07:00 - 21:00 (Tous les jours)',
        'telephone' => '+225 01 02 03 04 05',
        'email' => 'speedwash@ci.net',
        'note' => 4.4,
        'nbre_note' => 87,
        'latitude' => 5.360,
        'longitude' => -4.070
    ],
    [
        'nom' => 'Laverie Classique Pressing',
        'address' => 'Marcory Zone 4, Abidjan',
        'lieu' => 'Marcory',
        'description' => 'Pressing de confiance avec des années d\'expérience.',
        'horaires' => '08:30 - 18:30 (Lun - Sam)',
        'telephone' => '+225 07 08 09 10 11',
        'email' => 'contact@classiquepressing.ci',
        'note' => 4.6,
        'nbre_note' => 112,
        'latitude' => 5.339,
        'longitude' => -4.059
    ],
    [
        'nom' => 'Laverie Elégance Pressing',
        'address' => 'Yopougon Niangon, Abidjan',
        'lieu' => 'Yopougon',
        'description' => 'Élégance et soin dans le traitement de vos habits.',
        'horaires' => '08:00 - 19:00 (Tous les jours)',
        'telephone' => '+225 05 06 07 08 09',
        'email' => 'elegancepressing@ci.com',
        'note' => 4.7,
        'nbre_note' => 103,
        'latitude' => 5.340,
        'longitude' => -4.060
    ],
    [
        'nom' => 'Pressing Naturel H2o Pressing',
        'address' => 'Marcory Résidentiel, Boulevard Achalme (près Alrifai Flavor\'s)',
        'lieu' => 'Marcory',
        'description' => 'Pressing naturel avec matériel moderne.',
        'horaires' => 'Lun–Sam : 08h30 – 19h00',
        'telephone' => '+225 0806 0868',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.345,
        'longitude' => -4.065
    ],
    [
        'nom' => 'Pressing De L\'abidjanaise',
        'address' => 'Marcory Zone 3 (face immeuble OPERA)',
        'lieu' => 'Marcory',
        'description' => 'Pressing professionnel, nettoyage complet.',
        'horaires' => 'Horaires non disponibles',
        'telephone' => '+225 07 08 45 46 72',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.360,
        'longitude' => -4.070
    ],
    [
        'nom' => 'NOOR Pressing',
        'address' => 'Marcory Résidentiel, 11 rue des Parnasses',
        'lieu' => 'Marcory',
        'description' => 'Pressing & nettoyage à sec, style soigné.',
        'horaires' => 'Lun–Sam : 07h00 – 19h00 • Dim : 09h00 – 15h00',
        'telephone' => '+225 49 49 72 21',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.339,
        'longitude' => -4.059
    ],
    [
        'nom' => 'KS LAUNDRY',
        'address' => 'Marcory, Zone 4, rue Louis Lumière',
        'lieu' => 'Marcory',
        'description' => 'Collecte & livraison en 24h, équipements pro.',
        'horaires' => 'Lun–Sam : 07h30 – 18h00',
        'telephone' => '+225 21 35 35 59',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.340,
        'longitude' => -4.060
    ],
    [
        'nom' => 'Mobil Pressing',
        'address' => 'Marcory Zone 4B, Rue Dr Blanchard',
        'lieu' => 'Marcory',
        'description' => 'Pressing à bon prix.',
        'horaires' => 'Horaires non disponibles',
        'telephone' => '+225 41 24 84 50',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.345,
        'longitude' => -4.065
    ],
    [
        'nom' => 'Laverie Océane',
        'address' => 'Koumassi (près église Shilo / Tassala)',
        'lieu' => 'Koumassi',
        'description' => 'Blanchisserie à Koumassi.',
        'horaires' => 'Horaires non disponibles',
        'telephone' => '',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.360,
        'longitude' => -4.070
    ],
    [
        'nom' => 'Pressing Koumassi',
        'address' => 'Rue des Anufo, Koumassi/Treichville',
        'lieu' => 'Koumassi',
        'description' => 'Pressing local traditionnel.',
        'horaires' => 'Horaires non disponibles',
        'telephone' => '',
        'email' => '',
        'note' => 0.0,
        'nbre_note' => 0,
        'latitude' => 5.339,
        'longitude' => -4.059
    ]
];

// Préparer et exécuter l'insertion pour chaque laverie
$stmt = $pdo->prepare("INSERT INTO t_laveries (nom, address, lieu, description, horaires, telephone, email, note, nbre_note, latitude, longitude) VALUES (:nom, :address, :lieu, :description, :horaires, :telephone, :email, :note, :nbre_note, :latitude, :longitude)");

foreach ($laveries as $laverie) {
    $stmt->execute([
        ':nom' => $laverie['nom'],
        ':address' => $laverie['address'],
        ':lieu' => $laverie['lieu'],
        ':description' => $laverie['description'],
        ':horaires' => $laverie['horaires'],
        ':telephone' => $laverie['telephone'],
        ':email' => $laverie['email'],
        ':note' => $laverie['note'],
        ':nbre_note' => $laverie['nbre_note'],
        ':latitude' => $laverie['latitude'],
        ':longitude' => $laverie['longitude']
    ]);
}

echo "Données des laveries insérées avec succès dans la table t_laveries !";
