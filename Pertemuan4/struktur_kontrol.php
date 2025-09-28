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
?>