<?php
session_start();

if (isset($_SESSION['nama_pengguna'])) {
    header("Location: reservasi.php");
    exit();
}

$pesan_salah = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Panggil file koneksi database
    include 'koneksi.php';

    $username    = trim($_POST['username']);
    $kata_sandi  = $_POST['kata_sandi'];

    if (empty($username) || empty($kata_sandi)) {
        $pesan_salah = "Username dan kata sandi harus diisi!";

    } else {

        $pernyataan = $koneksi->prepare("SELECT * FROM pengguna WHERE username = ?");
        $pernyataan->bind_param("s", $username);
        $pernyataan->execute();
        $hasil = $pernyataan->get_result();

        if ($hasil->num_rows === 1) {
            $data_pengguna = $hasil->fetch_assoc();

            if (password_verify($kata_sandi, $data_pengguna['kata_sandi'])) {

                $_SESSION['nama_pengguna'] = $data_pengguna['username'];
                $_SESSION['id_pengguna']   = $data_pengguna['id'];

                header("Location: reservasi.php");
                exit();

            } else {
                $pesan_salah = "Kata sandi salah. Silakan coba lagi.";
            }

        } else {
            $pesan_salah = "Username tidak ditemukan.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Hair Lab Studio</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="halaman-login">

<div class="kotak-login">

    <div class="nama-salon">✂ Hair Lab Studio</div>
    <div class="slogan">Premium Salon Experience</div>

    <h2>Masuk Akun</h2>

    <?php if (!empty($pesan_salah)): ?>
        <div class="pesan-error">⚠ <?= htmlspecialchars($pesan_salah) ?></div>
    <?php endif; ?>

    <form action="" method="POST">

        <div class="kelompok-isian">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Masukkan username"
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
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" class="tombol-kirim">Masuk</button>

    </form>

    <div class="tautan-daftar">
        Belum punya akun? <a href="register.php">Daftar di sini</a>
    </div>

</div>

</body>
</html>