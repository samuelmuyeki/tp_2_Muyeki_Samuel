<?php
session_start();

// Vérification de la présence du nombre d'adresses dans la session
if (!isset($_SESSION['address_count'])) {
    header("Location: index.php");
    exit();
}
// initialisation des informations sur la base des données
$server ="localhost";
$username = "root";
$password = "";
$db = "ecom1_tp2";

// Création de la connexion à la base de données
$conn = new mysqli($server, $username, $password, $db);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Création de la table si elle n'existe pas
$sql_create_table = "CREATE TABLE IF NOT EXISTS addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    street VARCHAR(50) NOT NULL,
    street_nb INT NOT NULL,
    type VARCHAR(20) NOT NULL,
    city VARCHAR(50) NOT NULL,
    zipcode VARCHAR(6) NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'addresses' créée avec succès!";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
}

// Récupération des données du formulaire
for ($i = 1; $i <= $_SESSION['address_count']; $i++) {
    $street = filter_input(INPUT_POST, 'street' . $i, FILTER_SANITIZE_STRING);
    $street_nb = filter_input(INPUT_POST, 'street_nb' . $i, FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST, 'type' . $i, FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city' . $i, FILTER_SANITIZE_STRING);
    $zipcode = filter_input(INPUT_POST, 'zipcode' . $i, FILTER_SANITIZE_STRING);

    // Requête préparée pour l'insertion des données dans la base de données
    $stmt = $conn->prepare("INSERT INTO addresses (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)");

    // Vérification de la réussite de la préparation de la requête
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Liaison des paramètres et vérification du succès
    if (!$stmt->bind_param("sisss", $street, $street_nb, $type, $city, $zipcode)) {
        die("Erreur lors de la liaison des paramètres : " . $stmt->error);
    }

    // Exécution de la requête
    if (!$stmt->execute()) {
        die("Erreur lors de l'exécution de la requête : " . $stmt->error);
    }

    // Fermeture du statement
    $stmt->close();
}

// Fermeture de la connexion à la base de données
$conn->close();

// Redirection vers la page de vérification
header("Location: verification.php");
exit();
?>

