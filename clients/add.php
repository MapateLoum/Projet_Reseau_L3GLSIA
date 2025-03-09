<?php
include "../config/database.php";
include "../includes/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO clients (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Tous les champs sont obligatoires.</p>";
    }
}
?>

<h2>Ajouter un client</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Ajouter</button>
</form>

<?php include "../includes/footer.php"; ?>
