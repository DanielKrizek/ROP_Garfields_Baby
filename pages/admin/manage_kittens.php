<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$query = "SELECT * FROM kotata";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Správa koťat</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a> <!-- Link to the admin panel -->
    <h1>Správa koťat</h1>
    <a href="add_kitten.php">Přidat kotě</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Kód barvy</th>
            <th>Barva</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['color_code']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td>
                    <a href="edit_kitten.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_kitten.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>