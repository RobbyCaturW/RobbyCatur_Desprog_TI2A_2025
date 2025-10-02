<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin'=> 'Perempuan'
    ];
    echo '<table border=1 cellpadding=10><tr>';
    echo "<td>Nama</td>";
    echo "<td>Domisili</td>";
    echo "<td>Jenis Kelamin</td></tr>";
    echo "<tr><td>{$Dosen['nama']}</td>";
    echo "<td>{$Dosen['domisili']}</td>";
    echo "<td>{$Dosen['jenis_kelamin']}</td>";
    echo "</tr></table>";
    ?>
</body>
</html>