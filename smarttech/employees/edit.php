<?php
// employees/edit.php

include '../includes/db.php';
include '../includes/header.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("UPDATE employees SET username = :username, email = :email, position = :position , password = :password WHERE id = :id");
    $stmt->execute(['username'=> $username, 'email' => $email, 'position' => $position, 'password' => $password ,'id' => $id]);

    header("Location: list.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM employees WHERE id = :id");
$stmt->execute(['id' => $id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Modifier un employé</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $employee['username'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $employee['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Poste</label>
            <input type="text" class="form-control" id="position" name="position" value="<?= $employee['position'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="position" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $employee['password'] ?>" required>
        </div>
        <button type="submit" class="btn btn-warning">Modifier</button>
    </form>
</div>

<?php
include '../includes/footer.php';
?>