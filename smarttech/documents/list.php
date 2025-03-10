<?php
// documents/list.php

include '../includes/db.php';
include '../includes/header.php';

$stmt = $conn->query("SELECT documents.*, employees.name AS uploaded_by_name FROM documents JOIN employees ON documents.uploaded_by = employees.id");
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Liste des documents</h2>
    <a href="upload.php" class="btn btn-primary mb-3">Uploader un document</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du fichier</th>
                <th>Chemin du fichier</th>
                <th>Uploadé par</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $document): ?>
            <tr>
                <td><?= $document['id'] ?></td>
                <td><?= $document['file_name'] ?></td>
                <td><?= $document['file_path'] ?></td>
                <td><?= $document['uploaded_by_name'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $document['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include '../includes/footer.php';
?>