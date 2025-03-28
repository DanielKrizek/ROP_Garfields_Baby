<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "news");
$query = "SELECT * FROM news ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Správa článků</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a>
    <h1>Správa článků</h1>
    <a href="add_article.php">Přidat článek</a>
    <table border="1">
        <tr>
            <th>Titulek</th>
            <th>Datum</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['created_at']) ?></td>
                <td>
                    <a href="edit_article.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_article.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>