<?php
// clients/add.php

include '../includes/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO clients (name, email, phone) VALUES (:name, :email, :phone)");
    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone]);

    header("Location: list.php");
    exit();
}
?>

<div class="container mt-5">
    <h2>Ajouter un client</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php
include '../includes/footer.php';
?>