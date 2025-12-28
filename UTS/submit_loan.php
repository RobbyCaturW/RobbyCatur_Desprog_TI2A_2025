<?php
header('Content-Type: application/json');

// Pastikan request adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Metode request tidak diizinkan.']);
    exit;
}

$name = htmlspecialchars(trim($_POST['name'] ?? ''));
$email = htmlspecialchars(trim($_POST['email'] ?? ''));
$title = htmlspecialchars(trim($_POST['title'] ?? ''));
$author = htmlspecialchars(trim($_POST['author'] ?? ''));
$year = $_POST['year'] ?? 0;
$date_borrowed = $_POST['date_borrowed'] ?? '';
$date_due = $_POST['date_due'] ?? '';
$notes = htmlspecialchars(trim($_POST['notes'] ?? ''));

$loan_record = [
    'name' => $name,
    'email' => $email,
    'title' => $title,
    'author' => $author,
    'year' => $year,
    'date_borrowed' => $date_borrowed,
    'date_due' => $date_due,
    'notes' => $notes,
    'server_timestamp' => time()
];

// Kirim balasan sukses (JSON) ke klien
echo json_encode([
    'status' => 'success',
    'message' => 'Data peminjaman diterima oleh server.',
    'data' => $loan_record
]);

?>