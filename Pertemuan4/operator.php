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

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "a identik dengan b → " . ($hasilIdentik ? "true" : "false") . "<br>";
echo "a tidak identik dengan b → " . ($hasilTidakIdentik ? "true" : "false") . "<br>";
?>