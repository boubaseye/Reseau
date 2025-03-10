<?php
// employees/delete.php

include '../includes/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM employees WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: list.php");
exit();
?>