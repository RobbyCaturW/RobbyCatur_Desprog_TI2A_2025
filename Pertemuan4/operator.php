<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil  = $a < $b;
$hasilLebihBesar  = $a > $b;
$hasilLebihKecilSama  = $a <= $b;
$hasilLebihBesarSama  = $a >= $b;

echo "Hasil Sama: " .($hasilSama ? "true" : "false").  "<br>";
echo "Hasil Tidak Sama: " .($hasilTidakSama ? "true" : "false").  "<br>";
echo "Hasil Lebih Kecil: " .($hasilLebihKecil ? "true" : "false").  "<br>";
echo "Hasil Lebih Besar: " .($hasilLebihBesar ? "true" : "false").  "<br>";
echo "Hasil Lebih Kecil Sama: " .($hasilLebihKecilSama ? "true" : "false").  "<br>";
echo "Hasil Lebih Besar Sama: " .($hasilLebihBesarSama ? "true" : "false").  "<br>";
?>