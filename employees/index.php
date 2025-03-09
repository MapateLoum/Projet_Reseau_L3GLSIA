<?php
include "../config/database.php";
include "../includes/header.php";

$employees = $pdo->query("SELECT * FROM employees")->fetchAll();
?>

<h2>Liste des employés</h2>
<a href="add.php" class="btn">Ajouter un employé</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Poste</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employees as $employee) : ?>
        <tr>
            <td><?= $employee['id'] ?></td>
            <td><?= htmlspecialchars($employee['name']) ?></td>
            <td><?= htmlspecialchars($employee['position']) ?></td>
            <td>
                <a href="edit.php?id=<?= $employee['id'] ?>">Modifier</a> |
                <a href="delete.php?id=<?= $employee['id'] ?>" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include "../includes/footer.php"; ?>
