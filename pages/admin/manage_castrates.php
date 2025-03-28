<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$query = "SELECT * FROM castrates";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Správa kastrátů</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a>
    <h1>Správa kastrátů</h1>
    <a href="add_castrate.php">Přidat kastráta</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a href="edit_castrate.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_castrate.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>