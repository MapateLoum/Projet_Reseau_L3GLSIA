<?php
include "../config/database.php";
include "../includes/header.php";

$id = $_GET["id"];
$employee = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$employee->execute([$id]);
$employee = $employee->fetch();

if (!$employee) {
    die("Employé introuvable !");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];

    if (!empty($name) && !empty($position)) {
        $stmt = $pdo->prepare("UPDATE employees SET name = ?, position = ? WHERE id = ?");
        $stmt->execute([$name, $position, $id]);
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Tous les champs sont obligatoires.</p>";
    }
}
?>

<h2>Modifier un employé</h2>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required>
    <input type="text" name="position" value="<?= htmlspecialchars($employee['position']) ?>" required>
    <button type="submit">Modifier</button>
</form>

<?php include "../includes/footer.php"; ?>
