<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A <br><br>";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B <br><br>";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C <br><br>";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D <br><br>";
}

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

echo "<h3>Perhitungan Jarak Atlet</h3>";
echo "Target jarak: $jarakTarget km<br>";
echo "Peningkatan harian: $peningkatanHarian km<br><br>";

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
<th>Hari ke-</th>
<th>Jarak Saat Ini (km)</th>
</tr>";

while ($jarakSaatIni < $jarakTarget) {
    $hari++;
    $jarakSaatIni += $peningkatanHarian;
    echo "<tr>
            <td>$hari</td>
            <td>$jarakSaatIni</td>
          </tr>";
}
echo "</table><br>";

echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";
echo "<br><br>";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i=1; $i <= $jumlahLahan; $i++) { 
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
    echo "Lahan ke-$i menghasilkan " . ($tanamanPerLahan * $buahPerTanaman) . " buah<br>";
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";

echo "<br><br>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

$jumlahSiswa = count($skorUjian);
$rataRata = $totalSkor / $jumlahSiswa;

echo "Total skor ujian adalah: $totalSkor <br>";
echo "Jumlah siswa: $jumlahSiswa <br>";
echo "Rata-rata skor ujian adalah: $rataRata";
?>