<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$query = "SELECT * FROM toms";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="../svg/logo.svg">
    <title>Správa kocourů</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a>
    <h1>Správa kocourů</h1>
    <a href="add_kocour.php">Přidat kocoura</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a href="edit_kocour.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_kocour.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>