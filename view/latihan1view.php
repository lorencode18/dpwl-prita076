<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="3" cellspacing="0">
         <tr>
            <th>NO.</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>ALAMAT</th>
            <th>NO.TELP</th>
        </tr>
        <?php
        $i = 1;
        foreach ($datamhs as $mhs) {
            echo '<tr>';
            echo '<td>' . $i++ . '.</td>';
            echo '<td>' . $mhs['nim'] . '</td>';
            echo '<td>' . $mhs['nama'] . '</td>';
            echo '<td>' . $mhs['alamat'] . '</td>';
            echo '<td>' . $mhs['no_telp'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
</html>