<?php
session_start();

if (isset($_SESSION['nama_pengguna'])) {
    header("Location: reservasi.php");
    exit();
}

$pesan_salah   = "";
$pesan_sukses  = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include 'koneksi.php';

    $username           = trim($_POST['username']);
    $kata_sandi         = $_POST['kata_sandi'];
    $ulangi_kata_sandi  = $_POST['ulangi_kata_sandi'];

    if (empty($username) || empty($kata_sandi) || empty($ulangi_kata_sandi)) {
        $pesan_salah = "Semua kolom harus diisi!";

    } elseif (strlen($kata_sandi) < 6) {
        $pesan_salah = "Kata sandi minimal 6 karakter!";

    } elseif ($kata_sandi !== $ulangi_kata_sandi) {
        $pesan_salah = "Kata sandi dan ulangi kata sandi tidak sama!";

    } else {

        $cek_username = $koneksi->prepare("SELECT id FROM pengguna WHERE username = ?");
        $cek_username->bind_param("s", $username);
        $cek_username->execute();
        $cek_username->store_result();

        if ($cek_username->num_rows > 0) {
            $pesan_salah = "Username sudah dipakai. Coba username lain.";

        } else {

            $kata_sandi_acak = password_hash($kata_sandi, PASSWORD_DEFAULT);

            $simpan = $koneksi->prepare("INSERT INTO pengguna (username, kata_sandi) VALUES (?, ?)");
            $simpan->bind_param("ss", $username, $kata_sandi_acak);

            if ($simpan->execute()) {
                $pesan_sukses = "Akun berhasil dibuat! Silakan masuk.";
            } else {
                $pesan_salah = "Gagal membuat akun. Coba lagi.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Hair Lab Studio</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="halaman-daftar">

<div class="kotak-daftar">

    <div class="nama-salon">HLS| Hair Lab Studio</div>
    <div class="slogan">Premium Salon Experience</div>

    <h2>Buat Akun Baru</h2>

    <?php if (!empty($pesan_salah)): ?>
        <div class="pesan-error">⚠ <?= htmlspecialchars($pesan_salah) ?></div>
    <?php endif; ?>

    <?php if (!empty($pesan_sukses)): ?>
        <div class="pesan-berhasil">✓ <?= htmlspecialchars($pesan_sukses) ?></div>
    <?php endif; ?>

    <form action="" method="POST">

        <div class="kelompok-isian">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Buat username"
                value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>"
                required
            >
        </div>

        <div class="kelompok-isian">
            <label for="kata_sandi">Password</label>
            <input
                type="password"
                id="kata_sandi"
                name="kata_sandi"
                placeholder="Minimal 6 karakter"
                required
            >
        </div>

        <div class="kelompok-isian">
            <label for="ulangi_kata_sandi">Ulangi Password</label>
            <input
                type="password"
                id="ulangi_kata_sandi"
                name="ulangi_kata_sandi"
                placeholder="Ketik ulang password"
                required
            >
        </div>
        <button type="submit" class="tombol-kirim">Buat Akun</button>

    </form>

    <div class="tautan-masuk">
        Sudah punya akun? <a href="login.php">Masuk di sini</a>
    </div>

</div>

</body>
</html>