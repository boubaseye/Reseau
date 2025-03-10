<?php
// clients/delete.php

include '../includes/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM clients WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: list.php");
exit();
?>