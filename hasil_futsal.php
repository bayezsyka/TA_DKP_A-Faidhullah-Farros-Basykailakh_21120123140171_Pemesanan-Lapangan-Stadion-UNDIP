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
// Mendapatkan data dari form
$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$tanggal = $_POST['tanggal'];
$jamMulai = $_POST['jam_mulai'];
$jamSelesai = $_POST['jam_selesai'];
$jenisLapangan = $_POST['jenis_lapangan'];
$fasilitasTambahan = isset($_POST['fasilitas_tambahan']) ? $_POST['fasilitas_tambahan'] : [];

// Fungsi untuk mengonversi waktu dalam format 24 jam ke menit
function waktuKeJam($waktu) {
   $jam = substr($waktu, 0, 2);
   $menit = substr($waktu, 3, 2);
   return $jam * 60 + $menit;
}

// Menghitung durasi sewa dalam jam
$mulai = waktuKeJam($jamMulai);
$selesai = waktuKeJam($jamSelesai);
$durasiSewa = ($selesai - $mulai) / 60;

// Menghitung harga sewa
$hargaSewa = $durasiSewa * 200000; // Harga sewa per jam adalah Rp 200.000

// Harga fasilitas tambahan
$hargaFasilitas = 0;
if (in_array('Wasit', $fasilitasTambahan)) {
   $hargaFasilitas += 100000; // Harga wasit Rp 100.000
}
if (in_array('Fotografer', $fasilitasTambahan)) {
   $hargaFasilitas += 150000; // Harga fotografer Rp 150.000
}

// Harga total
$totalHarga = $hargaSewa + $hargaFasilitas;

// HASIL OUTPUT DARI CODE DIATAS
echo "<h2>Ringkasan Pemesanan</h2>";
echo "<p>Nama: $nama</p>";
echo "<p>Nomor Telepon: $telepon</p>";
echo "<p>Tanggal Pemesanan: $tanggal</p>";
echo "<p>Jam Mulai: $jamMulai</p>";
echo "<p>Jam Selesai: $jamSelesai</p>";
echo "<p>Lapangan: $jenisLapangan</p>";
echo "<p>Fasilitas Tambahan: " . implode(", ", $fasilitasTambahan) . "</p>";
echo "<p>Durasi Sewa: $durasiSewa jam</p>";
echo "<p>Harga Sewa: Rp " . number_format($hargaSewa, 0, ',', '.') . "</p>";
echo "<p>Harga Fasilitas Tambahan: Rp " . number_format($hargaFasilitas, 0, ',', '.') . "</p>";
echo "<p>Total Harga: Rp " . number_format($totalHarga, 0, ',', '.') . "</p>";
    ?>
</body>
    <button onclick="history.back()">Kembali</button>
</html>
