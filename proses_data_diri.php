<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Diri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 500px;
        }
        h2 { border-bottom: 1px solid #ccc; padding-bottom: 10px; margin-top: 0;}
        table { width: 100%; margin-bottom: 20px; }
        td { padding: 8px 0; vertical-align: top; }
        .label { font-weight: bold; width: 130px; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tampilan Data Anda</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nama = htmlspecialchars($_POST['nama']);
        
        $tanggal_input = $_POST['tanggal_lahir']; 
        
        $bulan_indonesia = [
            1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        
        $pecah_tanggal = explode('-', $tanggal_input);
        $tahun = $pecah_tanggal[0];
        $bulan = (int)$pecah_tanggal[1]; 
        $hari = (int)$pecah_tanggal[2];  
        
        $tanggal_lahir_format = $hari . " " . $bulan_indonesia[$bulan] . " " . $tahun;
        
        if (isset($_POST['hobi'])) {
            $hobi = implode(", ", $_POST['hobi']);
        } else {
            $hobi = "Tidak ada hobi yang dipilih";
        }
        
    } else {
        echo "<p>Silakan isi form terlebih dahulu.</p>";
        echo "<a href='form_data_diri.html'>&laquo; Kembali ke Form</a>";
        echo "</div></body></html>";
        exit;
    }
    ?>

    <table>
        <tr>
            <td class="label">Nama Lengkap:</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td class="label">Tanggal Lahir:</td>
            <td><?php echo $tanggal_lahir_format; ?></td>
        </tr>
        <tr>
            <td class="label">Hobi:</td>
            <td><?php echo $hobi; ?></td>
        </tr>
    </table>

    <a href="form_data_diri.html">&laquo; Kembali ke Form</a>
</div>

</body>
</html>