//...

// Affichage des données pour vérification
echo '<h2>Adresses saisies :</h2>';
for ($i = 1; $i <= $_SESSION['address_count']; $i++) {
    echo '<h3>Adresse ' . $i . '</h3>';
    echo '<p>Street: ' . $_POST['street' . $i] . '</p>';
    echo '<p>Street Number: ' . $_POST['street_nb' . $i] . '</p>';
    echo '<p>Type: ' . $_POST['type' . $i] . '</p>';
    echo '<p>City: ' . $_POST['city' . $i] . '</p>';
    echo '<p>ZIP Code: ' . $_POST['zipcode' . $i] . '</p>';
}

// Bouton de confirmation
echo '<form action="insert_into_db.php" method="post">';
echo '<button type="submit" name="confirm">Confirmer l\'enregistrement</button>';
echo '</form>';
?>

