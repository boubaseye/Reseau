<?php
// clients/list.php

include '../includes/db.php';
include '../includes/header.php';

$stmt = $conn->query("SELECT * FROM clients");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Liste des clients</h2>
    <a href="add.php" class="btn btn-primary mb-3">Ajouter un client</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= $client['id'] ?></td>
                <td><?= $client['name'] ?></td>
                <td><?= $client['email'] ?></td>
                <td><?= $client['phone'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $client['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="delete.php?id=<?= $client['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../includes/footer.php';
?>