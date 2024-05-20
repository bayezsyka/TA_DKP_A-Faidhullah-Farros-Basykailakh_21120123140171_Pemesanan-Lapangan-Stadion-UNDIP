<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Lapangan Sepak Bola</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Pemesanan Lapangan Sepak Bola</h1>

    <?php
    function hitungHarga($jam) {
        $harga_per_jam = 450000;
        $total_harga = $harga_per_jam * $jam;
        return $total_harga;
    }

    // Memeriksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Memeriksa apakah semua input telah diisi
        if(isset($_POST['tanggal']) && isset($_POST['jam'])) {
            $tanggal = $_POST['tanggal'];
            $jam = $_POST['jam'];
            $total_harga = hitungHarga($jam);

            // Menampilkan informasi pemesanan
            echo "<h2>Informasi Pemesanan</h2>";
            echo "<p>Tanggal: $tanggal</p>";
            echo "<p>Jam: $jam</p>";
            echo "<p>Total Harga: Rp " . number_format($total_harga) . "</p>";

            // Proses penyimpanan pemesanan ke database atau sistem lainnya dapat ditambahkan di sini
        } else {
            echo "<p>Silakan lengkapi semua informasi terlebih dahulu.</p>";
        }
    }
    ?>

    <!-- Form Pemesanan Lapangan Futsal -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <label for="jam">Jam:</label>
        <select id="jam" name="jam" required>
            <option value="">Pilih Jam</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <!-- Tambahkan opsi jam lainnya sesuai kebutuhan -->
        </select><br><br>

        <input type="submit" name="submit" value="Pesan">
    </form>
</body>
</html>
