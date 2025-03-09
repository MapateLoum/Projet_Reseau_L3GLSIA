<?php
include "../config/database.php";
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];

    if (!empty($name) && !empty($position)) {
        $stmt = $pdo->prepare("INSERT INTO employees (name, position) VALUES (?, ?)");
        $stmt->execute([$name, $position]);
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Tous les champs sont obligatoires.</p>";
    }
}
?>

<h2>Ajouter un employé</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="text" name="position" placeholder="Poste" required>
    <button type="submit">Ajouter</button>
</form>

<?php include "../includes/footer.php"; ?>
