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

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil And: " .($hasilSama ? "true" : "false").  "<br>";
echo "Hasil Or: " .($hasilTidakSama ? "true" : "false").  "<br>";
echo "Hasil Not A: " .($hasilNotA ? $a : $b).  "<br>";
echo "Hasil Not B: " .($hasilNotB ? $b : $a).  "<br>";
?>