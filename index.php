<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse Form</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="address_count">Combien d'adresses avez-vous?</label>
        <input type="number" name="address_count" required>
        <button type="submit">Suivant</button>
    </form>
</body>
</html>
