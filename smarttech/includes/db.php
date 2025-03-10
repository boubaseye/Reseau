<?php
// includes/db.php

$host = 'localhost'; // Adresse du serveur MySQL
$dbname = 'smarttech'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL
$password = ''; // Mot de passe MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>