<?php
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $ftp_server = "192.168.1.17";
    $ftp_user = "ftpuser";
    $ftp_pass = "passer";

    $conn_id = ftp_connect($ftp_server);
    $login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);

    if (!$conn_id || !$login_result) {
        die("Connexion FTP échouée !");
    }

    $file = $_FILES["document"]["tmp_name"];
    $destination = "/documents/" . $_FILES["document"]["name"];

    if (ftp_put($conn_id, $destination, $file, FTP_BINARY)) {
        echo "<p>Fichier envoyé avec succès !</p>";
    } else {
        echo "<p>Échec de l'envoi du fichier.</p>";
    }

    ftp_close($conn_id);
}
?>

<h2>Ajouter un document</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="document" required>
    <button type="submit">Uploader</button>
</form>

<?php include "../includes/footer.php"; ?>
