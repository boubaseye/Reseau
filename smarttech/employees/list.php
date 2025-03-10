<?php
// employees/list.php

include '../includes/db.php';
include '../includes/header.php';

$stmt = $conn->query("SELECT * FROM employees");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Liste des employés</h2>
    <a href="add.php" class="btn btn-primary mb-3">Ajouter un employé</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['username'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td><?= $employee['position'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $employee['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $employee['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../includes/footer.php';
?>