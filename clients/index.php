<?php
include "../config/database.php";
include "../includes/header.php";

$clients = $pdo->query("SELECT * FROM clients")->fetchAll();
?>

<h2>Liste des clients</h2>
<a href="add.php" class="btn">Ajouter un client</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($clients as $client) : ?>
        <tr>
            <td><?= $client['id'] ?></td>
            <td><?= htmlspecialchars($client['name']) ?></td>
            <td><?= htmlspecialchars($client['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $client['id'] ?>">Modifier</a> |
                <a href="delete.php?id=<?= $client['id'] ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "../includes/footer.php"; ?>
