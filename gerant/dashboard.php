<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/styles.css">
    <title>Dashbord</title>
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
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo_blanc.png" alt="">
        </div>
        <div class="user">
            <img src="https://via.placeholder.com/40" alt="Admin">
            <span>Admin</span>
        </div>
    </div>
    <div class="sidebar">
        <a href="#" class="active">Tableau de bord</a>
        <a href="#">Machines</a>
        <a href="#">Clients</a>
        <a href="#">Réservations</a>
        <a href="#">Facturation</a>
        <a href="#">Statistiques</a>
        <a href="#">Paramètres</a>
    </div>
    <div class="main-content">
        <div class="dashboard-stats">
            <div class="stat-card">
                <h3>24</h3>
                <p>Machines totales <span style="color: green;">+2 depuis hier</span></p>
            </div>
            <div class="stat-card green">
                <h3>16</h3>
                <p>Machines disponibles <span>68% disponibilité</span></p>
            </div>
            <div class="stat-card purple">
                <h3>125 000 CFA</h3>
                <p>Revenu aujourd'hui <span style="color: green;">15% depuis hier</span></p>
            </div>
            <div class="stat-card orange">
                <h3>58</h3>
                <p>Clients actifs <span style="color: green;">3 nouveaux aujourd'hui</span></p>
            </div>
        </div>
        <div class="machines-table">
            <h2>Machines récentes</h2>
            <button class="add-machine">+ Ajouter machine</button>
            <div class="machine-container">
                <div class="machine-header">
                    <div>ID</div>
                    <div>TYPE</div>
                    <div>CAPACITÉ</div>
                    <div>LOCALISATION</div>
                    <div>STATUT</div>
                    <div>ACTIONS</div>
                </div>
                <div class="machine-item">
                    <div>#ML-001</div>
                    <div>Lave-linge</div>
                    <div>8 kg</div>
                    <div>Plateau, Abidjan</div>
                    <div><span class="status Disponible">Disponible</span></div>
                    <div class="actions">
                        <button><img src="https://via.placeholder.com/15/0000FF/FFFFFF?text=Edit" alt="Edit"></button>
                        <button><img src="https://via.placeholder.com/15/FF0000/FFFFFF?text=Delete" alt="Delete"></button>
                    </div>
                </div>
                <div class="machine-item">
                    <div>#ML-002</div>
                    <div>Sècheuse</div>
                    <div>10 kg</div>
                    <div>Cocody, Abidjan</div>
                    <div><span class="status En_cours">En cours</span></div>
                    <div class="actions">
                        <button><img src="https://via.placeholder.com/15/0000FF/FFFFFF?text=Edit" alt="Edit"></button>
                        <button><img src="https://via.placeholder.com/15/FF0000/FFFFFF?text=Delete" alt="Delete"></button>
                    </div>
                </div>
                <div class="machine-item">
                    <div>#ML-003</div>
                    <div>Lave-linge</div>
                    <div>12 kg</div>
                    <div>Marcory, Abidjan</div>
                    <div><span class="status Maintenance">Maintenance</span></div>
                    <div class="actions">
                        <button><img src="https://via.placeholder.com/15/0000FF/FFFFFF?text=Edit" alt="Edit"></button>
                        <button><img src="https://via.placeholder.com/15/FF0000/FFFFFF?text=Delete" alt="Delete"></button>
                    </div>
                </div>
                <div class="machine-item">
                    <div>#ML-004</div>
                    <div>Lave-linge</div>
                    <div>7 kg</div>
                    <div>Yopougon, Abidjan</div>
                    <div><span class="status Disponible">Disponible</span></div>
                    <div class="actions">
                        <button><img src="https://via.placeholder.com/15/0000FF/FFFFFF?text=Edit" alt="Edit"></button>
                        <button><img src="https://via.placeholder.com/15/FF0000/FFFFFF?text=Delete" alt="Delete"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="reservations">
            <h2>Réservations récentes</h2>
            <div class="reservation-item">
                <img src="https://via.placeholder.com/40" alt="Jean Kouadio">
                <div class="reservation-info">
                    <div>Jean Kouadio</div>
                    <div>Machine #ML-002 à Cocody</div>
                </div>
                <div class="reservation-time">14:30 - 16:00</div>
                <span class="reservation-status En_cours">En cours</span>
            </div>
            <div class="reservation-item">
                <img src="https://via.placeholder.com/40" alt="Aïcha Koné">
                <div class="reservation-info">
                    <div>Aïcha Koné</div>
                    <div>Machine #ML-004 à Yopougon</div>
                </div>
                <div class="reservation-time">17:00 - 18:30</div>
                <span class="reservation-status Confirmée">Confirmée</span>
            </div>
            <div class="reservation-item">
                <img src="https://via.placeholder.com/40" alt="Paul Affouda">
                <div class="reservation-info">
                    <div>Paul Affouda</div>
                    <div>Machine #ML-001 à Plateau</div>
                </div>
                <div class="reservation-time">09:00 - 10:30</div>
                <span class="reservation-status Terminée">Terminée</span>
            </div>
            <div class="see-all">
                <a href="#">Voir toutes les réservations</a>
            </div>
        </div>

    </div>
    <script>
        document.querySelectorAll('.actions button').forEach(button => {
            button.addEventListener('click', () => {
                alert('Action performed!');
            });
        });
        document.querySelector('.add-machine').addEventListener('click', () => {
            alert('Add new machine!');
        });
    </script>
</body>

</html>