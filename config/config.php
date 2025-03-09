<?php
// Configuration de la connexion à la base de données
$host = 'localhost';
$dbname = 'projet_reseau';
$username = 'papis';
$password = 'passer';

// Création de la connexion
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO pour lever des exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>
