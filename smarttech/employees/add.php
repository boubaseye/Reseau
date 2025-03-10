<?php
// employees/add.php

include '../includes/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO employees (username, email, position,password) VALUES (:username, :email, :position,:password)");
    $stmt->execute(['username' => $username, 'email' => $email, 'position' => $position,'password' => $password]);

    header("Location: list.php");
    exit();
}
?>

<div class="container mt-5">
    <h2>Ajouter un employé</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Poste</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php
include '../includes/footer.php';
?>