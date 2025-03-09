<?php
include "../includes/header.php";

$ftp_server = "192.168.1.17"; //
$ftp_user = "ftpuser";        //
$ftp_pass = "passer";       //

$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);

if (!$conn_id || !$login_result) {
    die("Connexion FTP échouée !");
}

$files = ftp_nlist($conn_id, "/documents/");

ftp_close($conn_id);
?>

<h2>Gestion des documents</h2>
<a href="upload.php" class="btn">Ajouter un document</a>

<table>
    <tr>
        <th>Nom du fichier</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($files as $file) : ?>
        <tr>
            <td><?= basename($file) ?></td>
            <td>
                <a href="download.php?file=<?= urlencode($file) ?>">Télécharger</a> |
                <a href="delete.php?file=<?= urlencode($file) ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "../includes/footer.php"; ?>
