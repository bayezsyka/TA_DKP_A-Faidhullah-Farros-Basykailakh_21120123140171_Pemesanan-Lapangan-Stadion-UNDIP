<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Lapangan Sepak Bola</title>
    <link rel="stylesheet" href="stylesoccer.css">
    <script>
        function validateForm() {
            const tanggal = document.getElementById('tanggal').value;
            const today = new Date().toISOString().split('T')[0];
            if (tanggal < today) {
                alert('Tanggal sudah lewat/kadaluarsa');
                return false;
            }
            return true;
        }

        function clearForm() {
            document.getElementById('myForm').reset();
            document.getElementById('totalHarga').innerText = 'Rp 0';
        }

        function setFullHour(inputId) {
            const input = document.getElementById(inputId);
            input.addEventListener('input', () => {
                const value = input.value;
                if (value) {
                    const [hour] = value.split(':');
                    input.value = `${hour}:00`;
                }
            });
        }

        window.onload = () => {
            setFullHour('jam_mulai');
            setFullHour('jam_selesai');
        };
    </script>
</head>
<body>
    <h2>Form Pemesanan Lapangan Sepak Bola</h2>
    <form id="myForm" action="hasil_soccer.php" method="post" onsubmit="return validateForm()">
        <h3>Informasi Pemesan:</h3>
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" pattern="[A-Za-z\s]+" title="Nama hanya boleh mengandung huruf" required><br>
        
        <label for="telepon">Nomor Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" pattern="\d{10,13}" title="Nomor telepon harus terdiri dari 10 hingga 13 digit angka" required><br>
        <small>Hanya bisa isi dengan angka</small><br>
        
        <h3>Detail Pemesanan:</h3>
        <label for="tanggal">Tanggal Pemesanan:</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br>
        
        <label for="jam_mulai">Jam Mulai:</label><br>
        <input type="time" id="jam_mulai" name="jam_mulai" required><br>
        
        <label for="jam_selesai">Jam Selesai:</label><br>
        <input type="time" id="jam_selesai" name="jam_selesai" required><br>
        <em>*Pilih jam nya saja<br></em>
        
        <label><input type="checkbox" name="fasilitas_tambahan[]" value="Wasit"> Wasit</label><br>
        <label><input type="checkbox" name="fasilitas_tambahan[]" value="Fotografer"> Fotografer</label><br>
        
        <input type="submit" value="Pesan">
        <button type="button" onclick="history.back()">Kembali</button>
        <button type="button" onclick="clearForm()">Clear</button>
    </form>
</body>
</html>
