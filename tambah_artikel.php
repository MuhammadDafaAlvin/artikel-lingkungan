<?php
require_once 'config/connection.php';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: masuk.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $deskripsi_sampul = $_POST['deskripsi_sampul'];
    $isi_deskripsi = $_POST['isi_deskripsi'];
    $tanggal_publikasi = $_POST['tanggal_publikasi'];
    $gambar_artikel = $_FILES['gambar_artikel'];
    $deskripsi_gambar = $_POST['deskripsi_gambar'];

    $uniqueFilename = uniqid() . '_' . basename($gambar_artikel['name']);
    $imagePath = 'assets/images/' . $uniqueFilename;
    move_uploaded_file($gambar_artikel['tmp_name'], $imagePath);

    $sql = "INSERT INTO artikel (judul, penulis, deskripsi_sampul, isi_deskripsi, tanggal_publikasi, gambar_artikel, deskripsi_gambar) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $judul, $penulis, $deskripsi_sampul, $isi_deskripsi, $tanggal_publikasi, $imagePath, $deskripsi_gambar);
    $stmt->execute();

    header("Location: artikel.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - Peduli Lingkungan</title>
</head>

<body>
    <h2>Tambah Artikel</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>
        <label>Penulis:</label>
        <input type="text" name="penulis" required><br>
        <label>Deskripsi Sampul:</label>
        <textarea name="deskripsi_sampul" required></textarea><br>
        <label>Isi Deskripsi:</label>
        <textarea name="isi_deskripsi" required></textarea><br>
        <label>Tanggal Publikasi:</label>
        <input type="date" name="tanggal_publikasi" required><br>
        <label>Gambar Artikel:</label>
        <input type="file" name="gambar_artikel" required><br>
        <label>Deskripsi Gambar:</label>
        <textarea name="deskripsi_gambar" required></textarea><br>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>