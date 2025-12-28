<?php
    include "koneksi.php";

    $database = new Database();
    $conn = $database->getConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM \"user\" WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['level'] == 1){
        echo "Anda berhasil login. silahkan menuju "; ?>
        <a href="homeAdmin.html">Halaman Admin</a>
    <?php
    }else if($row['level'] == 2){
        echo "Anda berhasil login. silahkan menuju "; ?>
        <a href="homeGuest.html">Halaman Guest</a>
    <?php
    }else{
        echo "Anda gagal login. silahkan " ;?>
        <a href="loginForm.html">Login kembali</a>
    <?php
    }
?>