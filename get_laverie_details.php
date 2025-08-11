<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'bd_laveries';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM t_laveries WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $laverie = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($laverie) {
        echo json_encode([
            'success' => true,
            'nom' => $laverie['nom'],
            'address' => $laverie['address'],
            'lieu' => $laverie['lieu'],
            'description' => $laverie['description'],
            'horaires' => $laverie['horaires'],
            'telephone' => $laverie['telephone'],
            'email' => $laverie['email'],
            'note' => $laverie['note'],
            'nbre_note' => $laverie['nbre_note']
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Laverie non trouvée']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID non spécifié']);
}
