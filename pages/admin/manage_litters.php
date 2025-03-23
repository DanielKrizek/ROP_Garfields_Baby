<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$query = "SELECT * FROM litters";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Správa odchovů</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a> <!-- Link to the admin panel -->
    <h1>Správa odchovů</h1>
    <a href="add_litter.php">Přidat odchov</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Obrázek</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><img src="<?= htmlspecialchars($row['image_url']) ?>" alt="Obrázek" width="100"></td>
                <td>
                    <a href="edit_litter.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_litter.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>