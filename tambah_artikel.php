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
    <link rel="stylesheet" href="public/css/tambah_artikel.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-table">
            <table>
                <tr>
                    <td><label for="judul">Judul:</label></td>
                    <td><input type="text" name="judul" id="judul" required></td>
                </tr>
                <tr>
                    <td><label for="penulis">Penulis:</label></td>
                    <td><input type="text" name="penulis" id="penulis" required></td>
                </tr>
                <tr>
                    <td><label for="deskripsi_sampul">Deskripsi Sampul:</label></td>
                    <td><textarea name="deskripsi_sampul" id="deskripsi_sampul" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="isi_deskripsi">Isi Deskripsi:</label></td>
                    <td><textarea name="isi_deskripsi" id="isi_deskripsi" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="tanggal_publikasi">Tanggal Publikasi:</label></td>
                    <td><input type="date" name="tanggal_publikasi" id="tanggal_publikasi" required></td>
                </tr>
                <tr>
                    <td><label for="gambar_artikel">Gambar Artikel:</label></td>
                    <td><input type="file" name="gambar_artikel" id="gambar_artikel" required></td>
                </tr>
                <tr>
                    <td><label for="deskripsi_gambar">Deskripsi Gambar:</label></td>
                    <td><textarea name="deskripsi_gambar" id="deskripsi_gambar" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Tambah</button></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>