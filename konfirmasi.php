<?php
session_start();

if (!isset($_SESSION['nama_pengguna'])) {
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['data_booking'])) {
    header("Location: reservasi.php");
    exit();
}

$data_booking = $_SESSION['data_booking'];
unset($_SESSION['data_booking']);
$tanggal_mudah_dibaca = date('d F Y', strtotime($data_booking['tanggal']));
$jam_mudah_dibaca = date('H:i', strtotime($data_booking['jam']));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Booking - Hair Lab Studio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <div class="nama-salon">✂ Hair Lab Studio</div>
    <div class="tautan-nav">
        <a href="index.php">Beranda</a>
        <a href="logout.php">Keluar (<?= htmlspecialchars($_SESSION['nama_pengguna']) ?>)</a>
    </div>
</nav>


<div class="pembungkus-konfirmasi">

    <h1>Booking Berhasil!</h1>
    <p class="kalimat-kecil">
        Reservasi Anda telah dikonfirmasi.<br>
        Tunjukkan kode booking ini saat datang ke salon.
    </p>

    <div class="kotak-kode-booking">
        <div class="keterangan">Kode Booking Anda</div>
        <div class="kode"><?= htmlspecialchars($data_booking['kode']) ?></div>
    </div>

    <div class="kotak-detail">

        <div class="baris-detail">
            <span class="teks-label">Nama</span>
            <span class="teks-nilai"><?= htmlspecialchars($data_booking['nama_pelanggan']) ?></span>
        </div>

        <div class="baris-detail">
            <span class="teks-label">Layanan</span>
            <span class="teks-nilai"><?= htmlspecialchars($data_booking['layanan']) ?></span>
        </div>

        <div class="baris-detail">
            <span class="teks-label">Tanggal</span>
            <span class="teks-nilai"><?= $tanggal_mudah_dibaca ?></span>
        </div>

        <div class="baris-detail">
            <span class="teks-label">Jam</span>
            <span class="teks-nilai"><?= $jam_mudah_dibaca ?> WIB</span>
        </div>

    </div>

    <div class="kelompok-tombol">
        <a href="reservasi.php" class="tombol-utama">Reservasi Lagi</a>
        <a href="index.php" class="tombol-sekunder">Ke Beranda</a>
    </div>

</div>


<footer>
    <p>&copy; 2025 Hair Lab Studio. All rights reserved.</p>
</footer>

</body>
</html>