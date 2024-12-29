<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: masuk.php");
    exit;
}

$host = "localhost";
$username = "root";
$password = "";
$database = "ArtikelLingkungan";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    $imagePath = 'uploads/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $imagePath);

    $sql = "INSERT INTO articles (title, content, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $content, $image['name']);
    $stmt->execute();
    header("Location: index.php");
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
        <input type="text" name="title" required><br>
        <label>Konten:</label>
        <textarea name="content" required></textarea><br>
        <label>Gambar:</label>
        <input type="file" name="image" required><br>
        <button type="submit">Tambah</button>
    </form>
</body>

</html>