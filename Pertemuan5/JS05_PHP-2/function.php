<?php
function perkenalan($nama, $salam) {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ". $nama." <br> ";
    echo "Senang berkenalan dengan Anda<br>";
}

perkenalan("Hambana", "Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";
perkenalan($saya, $ucapanSalam)
?>