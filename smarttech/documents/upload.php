<?php
// documents/upload.php

//session_start();
include '../includes/header.php';

// Vérifier si l'employé est connecté
if (!isset($_SESSION['employee_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../includes/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Informations de connexion FTP de l'employé
    $ftp_server = "localhost"; // Adresse du serveur FTP
    $ftp_username = $_SESSION['username']; // Nom d'utilisateur FTP de l'employé
    $ftp_password = $_SESSION['password']; // Mot de passe FTP de l'employé
    $ftp_directory = "/home/$ftp_username/ftp_uploads/"; // Répertoire de destination sur le serveur FTP

    // Chemin temporaire du fichier uploadé
    $local_file = $_FILES["file"]["tmp_name"];
    $remote_file = $ftp_directory . basename($_FILES["file"]["name"]);

    // Connexion au serveur FTP
    $conn_id = ftp_connect($ftp_server);

    if ($conn_id) {
        // Authentification
        $login_result = ftp_login($conn_id, $ftp_username, $ftp_password);

        if ($login_result) {
            // Upload du fichier
            if (ftp_put($conn_id, $remote_file, $local_file, FTP_BINARY)) {
                // Enregistrer le fichier dans la base de données
                $file_name = basename($_FILES["file"]["name"]);
                $file_path = "ftp://$ftp_server$remote_file"; // Chemin complet du fichier sur le serveur FTP
                $uploaded_by = $_SESSION['employee_id']; // ID de l'employé connecté

                $stmt = $conn->prepare("INSERT INTO documents (file_name, file_path, uploaded_by) VALUES (:file_name, :file_path, :uploaded_by)");
                $stmt->execute(['file_name' => $file_name, 'file_path' => $file_path, 'uploaded_by' => $uploaded_by]);

                echo "<div class='alert alert-success'>Le fichier a été uploadé avec succès via FTP.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erreur lors de l'upload du fichier via FTP.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Échec de l'authentification FTP.</div>";
        }

        // Fermer la connexion FTP
        ftp_close($conn_id);
    } else {
        echo "<div class='alert alert-danger'>Impossible de se connecter au serveur FTP.</div>";
    }
}
?>

<div class="container mt-5">
    <h2>Uploader un document via FTP</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Sélectionner un fichier</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Uploader</button>
    </form>
</div>

<?php
include '../includes/footer.php';
?>