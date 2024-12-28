<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "artikellingkungan";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil ID artikel dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Mengambil detail artikel
$sql = "SELECT id, judul, penulis, isi_deskripsi, tanggal_publikasi FROM Artikel";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: artikel.php");
    exit();
}

$artikel = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($artikel['judul']); ?></title>
    <link rel="stylesheet" href="detail_artikel.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/holding-hand.png" alt="menanam" />
                <a href="#">Peduli lingkungan</a>
            </div>
            <a info="beranda" href="artikel.php">Kembali</a>
        </nav>
    </header>

    <div class="artikel-container">
        <article>
            <div class="artikel-header">
                <h1><?= htmlspecialchars($artikel['judul']); ?></h1>
                <div class="artikel-meta">
                    <p>Penulis: <?= htmlspecialchars($artikel['penulis']); ?></p>
                    <?php if (isset($artikel['tanggal_publikasi'])): ?>
                        <p>Tanggal Publikasi: <?= date('d F Y', strtotime($artikel['tanggal_publikasi'])); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="artikel-content">
                <?= nl2br(htmlspecialchars($artikel['isi_deskripsi'])); ?>
            </div>
        </article>

        <a href="artikel.php" class="kembali-link">Kembali ke Daftar Artikel</a>
    </div>

    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>