<?php
// clients/edit.php

include '../includes/db.php';
include '../includes/header.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE clients SET name = :name, email = :email, phone = :phone WHERE id = :id");
    $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'id' => $id]);

    header("Location: list.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM clients WHERE id = :id");
$stmt->execute(['id' => $id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Modifier un client</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $client['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $client['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= $client['phone'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>

<?php
include '../includes/footer.php';
?>