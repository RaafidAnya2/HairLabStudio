<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Lab Studio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<nav>
    <div class="nama-salon">✂ Hair Lab Studio</div>

    <ul>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#tentang">Tentang</a></li>

        <?php if (isset($_SESSION['nama_pengguna'])): ?>
            <li><a href="reservasi.php">Reservasi</a></li>
            <li><a href="logout.php">Keluar (<?= htmlspecialchars($_SESSION['nama_pengguna']) ?>)</a></li>
        <?php else: ?>
            <li><a href="login.php">Masuk</a></li>
            <li><a href="register.php">Daftar</a></li>
        <?php endif; ?>
    </ul>
</nav>


<section class="banner-utama">
    <h1>Hair Lab Studio</h1>
    <p>Pengalaman salon premium untuk rambut sempurna Anda</p>

    <?php if (isset($_SESSION['nama_pengguna'])): ?>
        <a href="reservasi.php" class="tombol-utama">Buat Reservasi</a>
    <?php else: ?>
        <a href="login.php" class="tombol-utama">Buat Reservasi</a>
    <?php endif; ?>
</section>


<section class="tentang-kami" id="tentang">
    <h2>Tentang Kami</h2>
    <p>
        Hair Lab Studio hadir untuk memberikan pengalaman perawatan rambut terbaik
        dengan sentuhan profesional. Kami menggunakan produk premium dan teknik modern
        untuk memastikan Anda tampil percaya diri setiap hari.
    </p>
</section>


<section class="daftar-layanan" id="layanan">
    <h2>Layanan Kami</h2>

    <div class="susunan-kartu">

        <div class="kartu-layanan">
            <div class="ikon">✂️</div>
            <h3>Potong Rambut</h3>
            <div class="harga">Rp 50.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">🎨</div>
            <h3>Coloring</h3>
            <div class="harga">Rp 150.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">💆</div>
            <h3>Creambath</h3>
            <div class="harga">Rp 70.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">✨</div>
            <h3>Keratin</h3>
            <div class="harga">Rp 200.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">💫</div>
            <h3>Rebonding</h3>
            <div class="harga">Rp 250.000</div>
        </div>

    </div>
</section>


<section class="ajakan-reservasi">
    <h2>Siap Tampil Memukau?</h2>
    <p>Buat reservasi sekarang dan nikmati layanan salon terbaik kami</p>

    <?php if (isset($_SESSION['nama_pengguna'])): ?>
        <a href="reservasi.php" class="tombol-utama">Reservasi Sekarang</a>
    <?php else: ?>
        <a href="login.php" class="tombol-utama">Reservasi Sekarang</a>
    <?php endif; ?>
</section>


<footer>
    <p>&copy; 2025 Hair Lab Studio. All rights reserved.</p>
</footer>

</body>
</html>