<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemesanan Lapangan Futsal</title>
    <link rel="stylesheet" href="stylehasilfutsal.css">
</head>
<body>
    <h2>Hasil Pemesanan Lapangan Futsal</h2>
    <?php
    // Memeriksa apakah data formulir telah dikirimkan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari formulir
        $nama = $_POST["nama"];
        $telepon = $_POST["telepon"];
        $tanggal = $_POST["tanggal"];
        $jam_mulai = $_POST["jam_mulai"];
        $jam_selesai = $_POST["jam_selesai"];
        $jenis_lapangan = $_POST["jenis_lapangan"];
        
        // Memeriksa apakah ada fasilitas tambahan yang dipilih
        if(isset($_POST["fasilitas_tambahan"])) {
            $fasilitas_tambahan = implode(", ", $_POST["fasilitas_tambahan"]);
        } else {
            $fasilitas_tambahan = "Tidak ada";
        }

        // Menampilkan hasil pemesanan
        echo "<p>Nama Pemesan: $nama</p>";
        echo "<p>Nomor Telepon: $telepon</p>";
        echo "<p>Tanggal Pemesanan: $tanggal</p>";
        echo "<p>Jam Mulai: $jam_mulai</p>";
        echo "<p>Jam Selesai: $jam_selesai</p>";
        echo "<p>Jenis Lapangan: $jenis_lapangan</p>";
        echo "<p>Fasilitas Tambahan: $fasilitas_tambahan</p>";
    } else {
        // Jika data formulir belum dikirimkan, tampilkan pesan error
        echo "<p>Terjadi kesalahan. Silakan kembali ke halaman sebelumnya.</p>";
    }
    ?>
</body>
    <button onclick="history.back()">Kembali</button>
</html>
