<?php
include "../config/database.php";
include "../includes/header.php";

$id = $_GET["id"];
$client = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
$client->execute([$id]);
$client = $client->fetch();

if (!$client) {
    die("Client introuvable !");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("UPDATE clients SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Tous les champs sont obligatoires.</p>";
    }
}
?>

<h2>Modifier un client</h2>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($client['name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>
    <button type="submit">Modifier</button>
</form>

<?php include "../includes/footer.php"; ?>
