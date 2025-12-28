<?php
require_once 'koneksi.php';

$db = new Database();
$conn = $db->getConnection();

try {
    $query = 'CREATE TABLE IF NOT EXISTS "user" (
        id SERIAL PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    )';

    $exec = $conn->prepare($query);
    $exec->execute();

    echo "Tabel user berhasil dibuat!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
