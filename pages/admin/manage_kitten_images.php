<?php
session_start();
include("../../php/connection.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

$conn = new mysqli("localhost", "root", "", "odchovy");
$query = "SELECT ki.id, ki.image_url, k.name AS kitten_name 
          FROM kotata_obrazky ki 
          JOIN kotata k ON ki.kitten_id = k.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Správa obrázků koťat</title>
</head>

<body>
    <a href="index.php">Zpět na admin panel</a>
    <h1>Správa obrázků koťat</h1>
    <a href="add_kitten_image.php">Přidat obrázek</a>
    <table border="1">
        <tr>
            <th>Jméno kotěte</th>
            <th>Obrázek</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['kitten_name']) ?></td>
                <td><img src="../../<?= htmlspecialchars($row['image_url']) ?>" alt="Obrázek kotěte" width="100"></td>
                <td>
                    <a href="edit_kitten_image.php?id=<?= $row['id'] ?>">Upravit</a> <!-- Link to edit -->
                    <a href="delete_kitten_image.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>