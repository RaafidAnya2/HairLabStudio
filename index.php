<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hair Lab Studio</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="gaya.css">
</head>
<body>

<!-- MENU NAVIGASI ATAS -->
<nav class="menu-navigasi-atas">
    <div class="nama-studio-di-nav">
      H<span class="huruf-emas">L</span>S &nbsp;|&nbsp; HAIR <span class="huruf-emas">Lab</span> Studio
    </div>

    <ul class="daftar-link-menu">
      <li><a href="#layanan">Layanan</a></li>
      <li><a href="#tentang">Tentang</a></li>
      <li><a href="#galeri">Galeri</a></li>
      <li><a href="#kontak">Kontak</a></li>
    </ul>

    <div class="grup-tombol-masuk-daftar">
      <?php if (isset($_SESSION['nama_pengguna'])): ?>
          <button class="tombol-masuk"
                  onclick="window.location.href='reservasi.php'">
              Reservasi
          </button>

          <button class="tombol-daftar"
                  onclick="window.location.href='logout.php'">
              Keluar (<?= $_SESSION['nama_pengguna'] ?>)
          </button>
      <?php else: ?>
          <button class="tombol-masuk"
                  onclick="window.location.href='login.php'">
              Masuk
          </button>

          <button class="tombol-daftar"
                  onclick="window.location.href='register.php'">
              Daftar
          </button>
      <?php endif; ?>
    </div>
</nav>

<!-- SECTION UTAMA HALAMAN -->
<section class="section-utama-halaman">

    <div class="lingkaran-dekorasi-besar"></div>
    <div class="lingkaran-dekorasi-sedang"></div>
    <div class="lingkaran-dekorasi-kecil"></div>

    <!-- KOLOM KIRI -->
    <div class="kolom-kiri-teks">
      <div class="label-kecil-atas-judul">Premium Hair Studio</div>

      <h1 class="judul-besar-utama">
        HAIR <span class="huruf-emas">Lab</span><br>STUDIO
      </h1>

      <p class="kalimat-tagline-miring">
        Temukan versi terbaik rambutmu.
      </p>

      <p class="paragraf-penjelasan-studio">
        Kami hadir untuk memberikan pengalaman perawatan rambut yang personal,
        nyaman, dan profesional langsung dari tangan ahlinya.
      </p>

      <div class="grup-tombol-bawah-teks">
        <?php if (isset($_SESSION['nama_pengguna'])): ?>
            <button class="tombol-lihat-layanan"
                    onclick="window.location.href='reservasi.php'">
                Buat Reservasi
            </button>
        <?php else: ?>
            <button class="tombol-lihat-layanan"
                    onclick="window.location.href='login.php'">
                Buat Reservasi
            </button>
        <?php endif; ?>
      </div>
    </div>

    <!-- KOLOM KANAN -->
    <div class="kolom-kanan-foto">
      <div class="wadah-foto foto-besar-kanan"></div>
      <div class="wadah-foto foto-kecil-tumpuk-kiri"></div>

      <div class="badge-rating-melayang">
        <span class="angka-bintang">5★</span>
        <span class="tulisan-rating">Rating</span>
      </div>
    </div>

</section>

<!-- BAR STATISTIK -->
<div class="bar-statistik-paling-bawah">
    <div class="kotak-angka-statistik">
      <span class="angka-besar-statistik">500+</span>
      <span class="tulisan-kecil-statistik">Pelanggan Puas</span>
    </div>

    <div class="kotak-angka-statistik">
      <span class="angka-besar-statistik">8+</span>
      <span class="tulisan-kecil-statistik">Layanan</span>
    </div>

    <div class="kotak-angka-statistik">
      <span class="angka-besar-statistik">5yr</span>
      <span class="tulisan-kecil-statistik">Pengalaman</span>
    </div>

    <div class="kotak-angka-statistik">
      <span class="angka-besar-statistik">100%</span>
      <span class="tulisan-kecil-statistik">Produk Premium</span>
    </div>
</div>

<!-- bates yg aku ubah -->

<div class="wrapper-tentang">
    <h2>Tentang Kami</h2>

    <section class="tentang-kami" id="tentang">
        <div class="gambar-tentang">
            <img src="img/interior.png" alt="interior">
            <img src="img/salon.png" alt="salon">
        </div>

    <div class="teks-tentang">
    <p>
    Hair Lab Studio hadir sebagai pilihan terbaik untuk Anda yang menginginkan
    perawatan rambut berkualitas dengan pelayanan profesional.
    Kami percaya bahwa rambut yang sehat dan tertata dengan baik dapat meningkatkan
    rasa percaya diri setiap individu. Dengan dukungan penggunaan produk premium berkualitas tinggi, serta teknik perawatan modern,
    kami berkomitmen memberikan hasil terbaik sesuai kebutuhan dan karakter setiap pelanggan.
</p>
<br>
<p>
    Mulai dari potong rambut, pewarnaan, creambath, hingga treatment khusus seperti
    keratin dan rebonding, setiap layanan kami dirancang untuk memberikan pengalaman
    perawatan yang memuaskan. 
</p>
    </div>
</section>


<section class="daftar-layanan" id="layanan">
    <h2>Layanan Kami</h2>

    <div class="susunan-kartu">

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/potong.png" alt="potong">
            </div>
            <h3>Potong Rambut</h3>
            <div class="harga">Rp 50.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/coloring.png" alt="coloring">
            </div>
            <h3>Coloring</h3>
            <div class="harga">Rp 150.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/creambath.png" alt="creambath">
            </div>
            <h3>Creambath</h3>
            <div class="harga">Rp 70.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/keratin.png" alt="keratin">
            </div>
            <h3>Keratin</h3>
            <div class="harga">Rp 200.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/keramas.png" alt="keramas">
            </div>
            <h3>Keramas</h3>
            <div class="harga">Rp 30.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/scalp.png" alt="scalp">
            </div>
            <h3>Scalp Treatment</h3>
            <div class="harga">Rp 100.000</div>
        </div>

        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/extension.png" alt="extension">
            </div>
            <h3>Extension Rambut</h3>
            <div class="harga">Rp 175.000</div>
        </div>


        <div class="kartu-layanan">
            <div class="ikon">
            <img src="img/rebonding.png" alt="rebonding">
            </div>
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
    <p>&copy; 2026 Hair Lab Studio. All rights reserved.</p>
</footer>

</body>
</html>