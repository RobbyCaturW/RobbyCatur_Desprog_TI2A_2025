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

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

$totalSiswa = count($nilaiSiswa);
$lulus = 0;
$tidakLulus = 0;

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        $tidakLulus++;
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
    $lulus++;
}

echo "<br>Jumlah siswa: $totalSiswa <br>";
echo "Jumlah lulus: $lulus <br>";
echo "Jumlah tidak lulus: $tidakLulus <br>";

$persenLulus = ($lulus / $totalSiswa) * 100;
echo "Persentase kelulusan: " .$persenLulus. "%";
echo "<br><br>";

$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
for ($i = 0; $i < count($nilaiSiswa); $i++) {
    for ($j = 0; $j < count($nilaiSiswa) - 1; $j++) {
        if ($nilaiSiswa[$j] > $nilaiSiswa[$j + 1]) {
            $temp = $nilaiSiswa[$j];
            $nilaiSiswa[$j] = $nilaiSiswa[$j + 1];
            $nilaiSiswa[$j + 1] = $temp;
        }
    }
}
$totalNilai = 0;
$jumlahSiswaDipakai = 0;

for ($i = 0; $i < count($nilaiSiswa); $i++) {
    if ($i >= 2 && $i < count($nilaiSiswa) - 2) {
        $totalNilai += $nilaiSiswa[$i];
        $jumlahSiswaDipakai++;
    }
}
$rataRata = $totalNilai / $jumlahSiswaDipakai;
echo "Daftar nilai (sudah diurutkan): ";
for ($i = 0; $i < count($nilaiSiswa); $i++) {
    echo $nilaiSiswa[$i] . " ";
}
echo "<br>";

echo "Total nilai yang dihitung: $totalNilai <br>";
echo "Jumlah siswa yang dihitung: $jumlahSiswaDipakai <br>";
echo "Rata-rata nilai: " . $rataRata;
echo "<br><br>";

$hargaProduk = 120000;
$diskon = 0;
$hargaAkhir = $hargaProduk;

if ($hargaProduk > 100000) {
    $diskon = 0.20 * $hargaProduk;
    $hargaAkhir = $hargaProduk - $diskon;
}

echo "Harga produk: Rp $hargaProduk <br>";
echo "Diskon: Rp $diskon <br>";
echo "Harga yang harus dibayar: Rp $hargaAkhir";
echo "<br><br>";

$poin = 620;
echo "Total skor pemain adalah: $poin <br>";
echo "Pemain mendapatkan hadiah tambahan? " . ($poin > 500 ? "YA" : "TIDAK");
?>