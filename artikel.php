<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ArtikelLingkungan";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artikel</title>
  <link rel="stylesheet" href="artikel.css" />
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <img src="img/holding-hand.png" alt="menanam" />
        <a href="#">Peduli lingkungan</a>
      </div>
      <a info="beranda" href="index.php">Beranda</a>
    </nav>
    <main>
      <div class="header">
        <h1>Artikel Lingkungan</h1>
        <p>
          Temukan langkah sederhana untuk menciptakan lingkungan yang bersih
          dan sehat. Jadilah bagian dari perubahan positif dari yang dimulai
          dari diri kita sendiri. Dapatkan inspirasi dan solusi seputar cara
          menjaga kelestarian alam, serta dampak positifnya bagi kehidupan.
        </p>
        <a info="telusuri" href="#container-artikel">Selengkapnya</a>
      </div>
      <div id="container-artikel" class="container-artikel">

        <?php
        $sql = "SELECT judul, penulis, deskripsi_sampul, isi_deskripsi FROM Artikel";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
            <div class="box">
              <h2><?= $row['judul']; ?></h2>
              <p>Penulis: <?= $row['penulis']; ?></p>
              <p><?= $row['deskripsi_sampul']; ?>
              </p>
              <a info="selengkapnya" href="#">Selengkapnya</a>
            </div>
        <?php }
        } else {
          echo '<p>Tidak ada artikel yang tersedia.</p>';
        } ?>
      </div>
    </main>
  </header>

  <?php $conn->close(); ?>
</body>

</html>