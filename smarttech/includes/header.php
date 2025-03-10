<?php
// includes/header.php

session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarttech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Smarttech</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TEST/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TEST/employees/list.php">Employés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/TEST/clients/list.php">Clients</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">