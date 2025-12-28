<?php
require_once 'koneksi.php';

$db = new Database();
$conn = $db->getConnection();

$username = "new";
$password = "1234"; // sebaiknya nanti hash pakai password_hash()

try {
    $query = 'INSERT INTO "user" (username, password) VALUES (:username, :password)';
    $exec = $conn->prepare($query);

    $exec->bindParam(':username', $username);
    $exec->bindParam(':password', $password);

    $exec->execute();

    echo "Insert berhasil!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
