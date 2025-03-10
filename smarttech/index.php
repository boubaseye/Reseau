<?php
// index.php
include 'includes/header.php';
?>

<div class="container mt-5">
    <h1>Bienvenue sur la plateforme Smarttech</h1>
    <div class="list-group">
        <a href="employees/list.php" class="list-group-item list-group-item-action">Gestion des employés</a>
        <a href="clients/list.php" class="list-group-item list-group-item-action">Gestion des clients</a>
        <a href="documents/upload.php" class="list-group-item list-group-item-action">Gestion des documents</a>
    </div>
</div>

<?php
include 'includes/footer.php';
?>