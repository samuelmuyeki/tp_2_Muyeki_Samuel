<?php
session_start();

// Vérification de la présence du nombre d'adresses dans la session
if (!isset($_SESSION['address_count'])) {
    header("Location: index.php");
    exit();
}

$address_count = $_SESSION['address_count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse Form</title>
</head>
<body>
    <form action="process_addresses.php" method="post">
        <?php for ($i = 1; $i <= $address_count; $i++): ?>
            <h2>Adresse <?= $i ?></h2>
            <label for="street<?= $i ?>">Street:</label>
            <input type="text" name="street<?= $i ?>" maxlength="50" required>

            <label for="street_nb<?= $i ?>">Street Number:</label>
            <input type="number" name="street_nb<?= $i ?>" required>

            <label for="type<?= $i ?>">Type:</label>
            <select name="type<?= $i ?>" required>
                <option value="livraison">Livraison</option>
                <option value="facturation">Facturation</option>
                <option value="autre">Autre</option>
            </select>

            <label for="city<?= $i ?>">City:</label>
            <select name="city<?= $i ?>" required>
                <option value="Montreal">Montreal</option>
                <option value="Laval">Laval</option>
                <option value="Toronto">Toronto</option>
                <option value="Quebec">Quebec</option>
            </select>

            <label for="zipcode<?= $i ?>">ZIP Code:</label>
            <input type="text" name="zipcode<?= $i ?>" pattern="\d{6}" maxlength="6" required>
        <?php endfor; ?>

        <button type="submit">Suivant</button>
    </form>
</body>
</html>
