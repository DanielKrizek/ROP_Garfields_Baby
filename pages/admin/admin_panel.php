<?php
session_start();
include("../../php/connection.php");
include("../../php/functions.php");

if ($_SESSION['role'] !== 'admin') {
    die("Přístup zamítnut.");
}

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn = new mysqli("localhost", "root", "", "kocicky");
$connNews = new mysqli("localhost", "root", "", "news");
$connUsers = new mysqli("localhost", "root", "", "login");
$connOdchovy = new mysqli("localhost", "root", "", "odchovy");

// Ensure the table name is correct
$queryCastrates = "SELECT * FROM castrates";
$resultCastrates = mysqli_query($conn, $queryCastrates);

$queryKocky = "SELECT * FROM cats";
$resultKocky = mysqli_query($conn, $queryKocky);

$queryKocouri = "SELECT * FROM toms";
$resultKocouri = mysqli_query($conn, $queryKocouri);

$queryClanky = "SELECT * FROM news ORDER BY created_at DESC";
$resultClanky = mysqli_query($connNews, $queryClanky);

$queryOdchovy = "SELECT * FROM litters";
$resultOdchovy = mysqli_query($connOdchovy, $queryOdchovy);

if (!$resultCastrates || !$resultKocky || !$resultKocouri || !$resultClanky || !$resultOdchovy) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="../../styles/admin.css">
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h1>Správa kastrátů</h1>
    <a href="add_castrate.php">Přidat kastráta</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultCastrates)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a href="edit_castrate.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_castrate.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Správa koček</h1>
    <a href="add_kocka.php">Přidat kočku</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultKocky)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a href="edit_kocka.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_kocka.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Správa kocourů</h1>
    <a href="add_kocour.php">Přidat kocoura</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultKocouri)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <a href="edit_kocour.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_kocour.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Správa článků</h1>
    <a href="add_article.php">Přidat článek</a>
    <table border="1">
        <tr>
            <th>Titulek</th>
            <th>Datum</th> <!-- Added new column header for date -->
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultClanky)): ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['created_at']) ?></td> <!-- Display article creation date -->
                <td>
                    <a href="edit_article.php?id=<?= $row['id'] ?>">Upravit</a>
                    <a href="delete_article.php?id=<?= $row['id'] ?>" onclick="return confirm('Opravdu chcete smazat?')">Smazat</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Správa odchovů</h1>
    <a href="add_litter.php">Přidat odchov</a>
    <table border="1">
        <tr>
            <th>Jméno</th>
            <th>Obrázek</th>
            <th>Akce</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($resultOdchovy)): ?>
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