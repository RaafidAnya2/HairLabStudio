<?php
session_start();

if (!isset($_SESSION['nama_pengguna'])) {
    header("Location: login.php");
    exit();
}

$daftar_layanan = [
    "Potong Rambut" => 50000,
    "Coloring"      => 150000,
    "Creambath"     => 70000,
    "Keratin"       => 200000,
    "Rebonding"     => 250000,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include 'koneksi.php';

    // Ambil data dari form
    $nama_pelanggan = trim($_POST['nama_pelanggan']);
    $layanan        = trim($_POST['layanan']);
    $tanggal        = $_POST['tanggal'];
    $jam            = $_POST['jam'];


    $kode_booking = "HL-" . time() . "-" . rand(100, 999);

    $simpan = $koneksi->prepare(
        "INSERT INTO reservasi (nama_pelanggan, layanan, tanggal, jam, kode_booking) VALUES (?, ?, ?, ?, ?)"
    );
    $simpan->bind_param("sssss", $nama_pelanggan, $layanan, $tanggal, $jam, $kode_booking);

    if ($simpan->execute()) {

        $_SESSION['data_booking'] = [
            'kode'           => $kode_booking,
            'nama_pelanggan' => $nama_pelanggan,
            'layanan'        => $layanan,
            'tanggal'        => $tanggal,
            'jam'            => $jam,
        ];

        header("Location: konfirmasi.php");
        exit();

    } else {
        $pesan_salah = "Gagal menyimpan reservasi. Silakan coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Hair Lab Studio</title>
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


<div class="kepala-halaman">
    <h1>Buat Reservasi</h1>
    <p>Pilih layanan dan jadwal yang Anda inginkan</p>
</div>


<div class="pembungkus-reservasi">
    <div class="kotak-form">

        <?php if (!empty($pesan_salah)): ?>
            <div class="pesan-error">⚠ <?= htmlspecialchars($pesan_salah) ?></div>
        <?php endif; ?>

        <form action="" method="POST">

            <div class="kelompok-isian">
                <label for="nama_pelanggan">Nama Lengkap</label>
                <input
                    type="text"
                    id="nama_pelanggan"
                    name="nama_pelanggan"
                    placeholder="Masukkan nama lengkap Anda"
                    required
                >
            </div>

            <div class="kelompok-isian">
                <label for="layanan">Pilih Layanan</label>
                <select id="layanan" name="layanan" onchange="tampilkanHarga()" required>
                    <option value="">-- Pilih Layanan --</option>
                    <?php foreach ($daftar_layanan as $nama_layanan => $harga): ?>
                        <option
                            value="<?= $nama_layanan ?>"
                            data-harga="<?= $harga ?>"
                        >
                            <?= $nama_layanan ?> - Rp <?= number_format($harga, 0, ',', '.') ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <div class="info-harga" id="kotak-harga"></div>
            </div>

            <div class="baris-dua-kolom">

                <div class="kelompok-isian">
                    <label for="tanggal">Tanggal</label>
                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        min="<?= date('Y-m-d') ?>"
                        required
                    >
                </div>

                <div class="kelompok-isian">
                    <label for="jam">Jam</label>
                    <input
                        type="time"
                        id="jam"
                        name="jam"
                        min="09:00"
                        max="20:00"
                        required
                    >
                </div>

            </div>

            <button type="submit" class="tombol-kirim">Konfirmasi Reservasi</button>

        </form>
    </div>
</div>


<footer>
    <p>&copy; 2025 Hair Lab Studio. All rights reserved.</p>
</footer>


<script>
function tampilkanHarga() {
    var pilihanLayanan = document.getElementById('layanan');
    var kotakHarga     = document.getElementById('kotak-harga');

    var harga = pilihanLayanan.options[pilihanLayanan.selectedIndex].getAttribute('data-harga');

    if (harga) {
        var hargaRupiah = new Intl.NumberFormat('id-ID').format(harga);
        kotakHarga.innerHTML = '💰 Estimasi biaya: <strong>Rp ' + hargaRupiah + '</strong>';
        kotakHarga.style.display = 'block';
    } else {
        kotakHarga.style.display = 'none';
    }
}
</script>

</body>
</html>