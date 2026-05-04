<?php
$alamat_server = "localhost";
$nama_pengguna = "root";
$kata_sandi    = "";
$nama_database = "hairlabstudio_db";

$koneksi = mysqli_connect($alamat_server, $nama_pengguna, $kata_sandi, $nama_database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>