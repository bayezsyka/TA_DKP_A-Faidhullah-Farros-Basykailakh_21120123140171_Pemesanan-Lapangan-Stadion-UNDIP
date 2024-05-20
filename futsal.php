<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Lapangan Futsal</title>
    <link rel="stylesheet" href="stylefutsal.css">
</head>
<body>
    <h2>Form Pemesanan Lapangan Futsal</h2>
    <form id="myForm" action="proses_pemesanan.php" method="post">
    <h3>Informasi Pemesan:</h3>
    <label for="nama">Nama Lengkap:</label><br>
    <input type="text" id="nama" name="nama" required><br>
    <label for="telepon">Nomor Telepon:</label><br>
    <input type="text" id="telepon" name="telepon" pattern="[0-9]+" required><br>
    <small>Hanya bisa isi dengan angka</small><br>
    
    <h3>Detail Pemesanan:</h3>
    <label for="tanggal">Tanggal Pemesanan:</label><br>
    <input type="date" id="tanggal" name="tanggal" required><br>
    <label for="jam_mulai">Jam Mulai:</label><br>
    <input type="time" id="jam_mulai" name="jam_mulai" required><br>
    <label for="jam_selesai">Jam Selesai:</label><br>
    <input type="time" id="jam_selesai" name="jam_selesai" required><br>
    <em>*Pilih jam nya saja<br></em>
    
    <h3>Pilihan Lapangan:</h3>
    <label><input type="radio" name="jenis_lapangan" value="Rumput" required> Lapangan Rumput</label><br>
    <label><input type="radio" name="jenis_lapangan" value="Vinyl" required> Lapangan Vinyl</label><br>
    
    <h3>Fasilitas Tambahan:</h3>
    <label><input type="checkbox" name="fasilitas_tambahan[]" value="Wasit"> Wasit</label><br>
    <label><input type="checkbox" name="fasilitas_tambahan[]" value="Fotografer"> Fotografer</label><br>
    
    <input type="submit" value="Pesan">
    <button type="button" onclick="history.back()">Kembali</button>
    <button type="button" onclick="clearForm()">Clear</button>
</form>
    <script>
     function clearForm() {
            document.getElementById('myForm').reset();
            document.getElementById('totalHarga').innerText = 'Rp 0';
        }

        function calculateTotalPrice() {
            const jamMulai = document.getElementById('jam_mulai').value;
            const jamSelesai = document.getElementById('jam_selesai').value;

            if (jamMulai && jamSelesai) {
                const mulai = new Date('1970-01-01T' + jamMulai + ':00');
                const selesai = new Date('1970-01-01T' + jamSelesai + ':00');
                const diffMs = selesai - mulai;
                const diffHrs = diffMs / (1000 * 60 * 60);

                if (diffHrs > 0) {
                    const pricePerHour = 100000; // Harga per jam, misalnya Rp 100,000
                    const totalPrice = diffHrs * pricePerHour;
                    document.getElementById('totalHarga').innerText = 'Rp ' + totalPrice.toLocaleString();
                } else {
                    document.getElementById('totalHarga').innerText = 'Jam selesai harus lebih besar dari jam mulai';
                }
            } else {
                document.getElementById('totalHarga').innerText = 'Rp 0';
            }
        }

        document.getElementById('jam_mulai').addEventListener('input', calculateTotalPrice);
        document.getElementById('jam_selesai').addEventListener('input', calculateTotalPrice);
    </script>
</body>
</html>
