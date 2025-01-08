# Environmental Articles Website 🌱

Website ini dibuat untuk memenuhi tugas akhir mata kuliah Pemrograman Web. Website ini dirancang untuk menampilkan artikel bertema lingkungan dengan antarmuka tema gelap yang menarik. Pengguna dapat membaca artikel, dan pengguna terdaftar memiliki fitur tambahan untuk menambahkan artikel baru.

## ✨ Fitur

1. **Bacaan Artikel**:

   - Tema gelap untuk kenyamanan membaca.
   - Semua artikel dapat diakses oleh pengunjung.

2. **Fitur Login dan Daftar**:

   - Pengguna harus terdaftar untuk dapat menambahkan artikel.

3. **Tambah Artikel**:
   - Pengguna terdaftar dapat menambahkan artikel dengan:
     - Judul artikel
     - Penulis
     - Tanggal publikasi
     - Gambar
   - Data artikel disimpan dalam basis data dan langsung ditampilkan di website.

## 🛠️ Teknologi yang Digunakan

- HTML, CSS, JavaScript, PHP, MySQL

## ⚙️ Instalasi dan Konfigurasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini menggunakan **XAMPP** di lingkungan lokal Anda:

### 1. **Persyaratan Sistem**

Pastikan Anda telah menginstal:

- **XAMPP**: Server lokal yang mencakup Apache, PHP, dan MySQL.
- **Git** (opsional, jika Anda menggunakan perintah `git clone` untuk mendapatkan repositori).

---

### 2. **Langkah Instalasi**

1. **Clone atau Unduh Repositori**

   - Jika menggunakan Git:
     ```bash
     git clone https://github.com/MuhammadDafaAlvin/environmental-articles-website.git
     ```
   - Jika tidak menggunakan Git:
     - Klik tombol **Code** di halaman repositori GitHub.
     - Pilih **Download ZIP**, lalu ekstrak file ZIP di komputer Anda.

2. **Pindahkan Proyek ke Folder XAMPP**

   - Salin folder proyek Anda ke folder `htdocs` di direktori instalasi XAMPP. Biasanya:
     ```
     C:\xampp\htdocs\
     ```
   - Setelah itu, Anda dapat mengakses proyek melalui browser dengan URL:
     ```
     http://localhost/environmental-articles-website
     ```

3. **Konfigurasi Database**

   - Buka **phpMyAdmin** melalui browser:
     ```
     http://localhost/phpmyadmin
     ```
   - Pastikan database bernama `artikellingkungan` sudah dibuat dan berisi data yang sesuai.
     - Jika belum, impor file database yang tersedia di folder `database/` (bernama `artikellingkungan.sql`):
       1. Klik database `artikellingkungan`.
       2. Klik tab **Import**.
       3. Pilih file `.sql` dan klik **Go**.

4. **Sesuaikan Koneksi Database**

   - Buka file konfigurasi database, biasanya `config.php` atau file serupa di proyek Anda.
   - Sesuaikan pengaturan koneksi database seperti berikut:
     ```php
     <?php
     $host = "127.0.0.1";
     $user = "root";
     $password = ""; // Kosongkan jika default XAMPP
     $database = "artikellingkungan";
     ?>
     ```

5. **Jalankan Server Lokal**
   - Buka aplikasi **XAMPP** dan aktifkan modul **Apache** dan **MySQL**.
   - Akses proyek Anda di browser:
     ```
     http://localhost/environmental-articles-website
     ```

---

Setelah langkah ini selesai, website Anda siap digunakan di server lokal.

---
