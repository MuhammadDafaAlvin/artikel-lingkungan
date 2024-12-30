<?php require_once 'config/connection.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artikel</title>
  <link rel="stylesheet" href="public/css/artikel.css" />
</head>

<body>
  <header>
    <nav>
      <a class="logo" href="index.php">Peduli lingkungan</a>
      <div class="menu__button">
        <a class="masuk" href="admin/masuk.php">Masuk</a>
      </div>
    </nav>
    <main>
      <div class="header">
        <h1>Artikel <span>Lingkungan</span></h1>
        <p>
          Temukan langkah sederhana untuk menciptakan lingkungan yang bersih
          dan sehat. Jadilah bagian dari perubahan positif dari yang dimulai
          dari diri kita sendiri. Dapatkan inspirasi dan solusi seputar cara
          menjaga kelestarian alam, serta dampak positifnya bagi kehidupan.
        </p>
        <div class="button__action">
          <a info="telusuri" href="#container-artikel">Lihat Artikel</a>
          <a info="beranda" href="index.php">Beranda</a>
        </div>
      </div>
      <div id="container-artikel" class="container-artikel">
        <?php
        $sql = "SELECT id, judul, penulis, deskripsi_sampul, isi_deskripsi FROM Artikel";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $deskripsi_sampul = $row['deskripsi_sampul'];
            $jumlah_kata = str_word_count($deskripsi_sampul);
        ?>
            <div class="box">
              <h2><?= $row['judul']; ?></h2>
              <p>Penulis: <?= $row['penulis']; ?></p>
              <?php if ($jumlah_kata <= 10) { ?>
                <p><?= $deskripsi_sampul; ?></p>
              <?php } ?>
              <a info="selengkapnya" href="detail_artikel.php?id=<?= $row['id']; ?>">Baca sekarang</a>
            </div>
        <?php
          }
        } else {
          echo '<p>Tidak ada artikel yang tersedia.</p>';
        }
        ?>
      </div>
    </main>
  </header>

  <?php $conn->close(); ?>
</body>

</html>