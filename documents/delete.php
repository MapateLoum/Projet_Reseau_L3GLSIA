<?php
$ftp_server = "192.168.1.17";
$ftp_user = "ftpuser";
$ftp_pass = "passer";

$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);

if (!$conn_id || !$login_result) {
    die("Connexion FTP échouée !");
}

$file = urldecode($_GET["file"]);

if (ftp_delete($conn_id, $file)) {
    echo "<p>Fichier supprimé avec succès !</p>";
} else {
    echo "<p>Échec de la suppression du fichier.</p>";
}

ftp_close($conn_id);
header("Location: index.php");
exit();
?>
