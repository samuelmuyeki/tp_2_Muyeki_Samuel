<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation du nombre d'adresses
    $address_count = filter_input(INPUT_POST, 'address_count', FILTER_VALIDATE_INT);
    
    if ($address_count !== false && $address_count > 0) {
        // Stockage du nombre d'adresses dans la session
        $_SESSION['address_count'] = $address_count;

        // Redirection vers le formulaire d'adresses
        header("Location: adresse.php");
        exit();
    } else {
        // Redirection en cas d'erreur
        header("Location: index.php");
        exit();
    }
} else {
    // Redirection en cas d'accès direct à ce fichier
    header("Location: index.php");
    exit();
}
?>
