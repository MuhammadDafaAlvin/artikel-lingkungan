<?php
require_once 'config/connection.php';

// Mengambil ID artikel dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Mengambil detail artikel
$sql = "SELECT id, judul, gambar_artikel,deskripsi_gambar, penulis, isi_deskripsi, tanggal_publikasi FROM Artikel WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // "i" menunjukkan tipe data integer
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
    <link rel="stylesheet" href="public/css/detail_artikel.css">
</head>

<body>
    <div class="artikel-container">
        <article>
            <div class="artikel-header">
                <h1><?= htmlspecialchars($artikel['judul']); ?></h1>
                <div class="biodata-penulis">
                    <p><?= htmlspecialchars($artikel['penulis']); ?></p>
                    <?php if (isset($artikel['tanggal_publikasi'])): ?>
                        <p><?= date('d F Y', strtotime($artikel['tanggal_publikasi'])); ?></p>
                    <?php endif; ?>
                </div>
                <img src="<?= $artikel['gambar_artikel']; ?>" alt="<?= $artikel['judul']; ?>">
            </div>

            <div class="artikel-content">
                <p class="deskripsi"><?= nl2br(htmlspecialchars($artikel['isi_deskripsi'])); ?></p>
            </div>
        </article>
    </div>
    <?php
    $stmt->close();
    $conn->close();
    ?>
</body>

</html>