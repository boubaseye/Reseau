<?php
// auth/login.php

// session_start();
include '../includes/header.php';

// Inclure la connexion à la base de données
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Préparer la requête pour récupérer l'employé par son nom d'utilisateur ou e-mail
        $stmt = $conn->prepare("SELECT id, username, email, password FROM employees WHERE username = :username OR email = :username");
        $stmt->execute(['username' => $username]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($employee) {
            // Vérifier le mot de passe
            if ($password == $employee['password']) {
                // Authentification réussie
                $_SESSION['employee_id'] = $employee['id']; // ID de l'employé
                $_SESSION['username'] = $employee['username']; // Nom d'utilisateur
                $_SESSION['email'] = $employee['email']; // E-mail de l'employé

                // Rediriger vers la page d'upload
                header("Location: ../documents/upload.php");
                exit();
            } else {
                // Mot de passe incorrect
                echo "<div class='alert alert-danger'>Mot de passe incorrect.</div>";
            }
        } else {
            // Employé non trouvé
            echo "<div class='alert alert-danger'>Nom d'utilisateur ou e-mail incorrect.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Erreur de connexion à la base de données : " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Connexion employé</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur </label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>