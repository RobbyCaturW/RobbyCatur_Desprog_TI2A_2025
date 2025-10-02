<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Array Terindeks</h2>
    <?php
    $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    echo $Listdosen[2] . "<br>";
    echo $Listdosen[0] . "<br>";
    echo $Listdosen[1] . "<br>";
    echo "<br><br>";
    echo "<h2>List Dosen Menggunakan Looping</h2>";
    for ($i=0; $i < count($Listdosen); $i++) { 
        echo $Listdosen[$i] ."<br>";
    }
    ?>    
</body>
</html>