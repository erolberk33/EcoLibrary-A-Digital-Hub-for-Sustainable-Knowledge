<?php
session_start();
require_once 'sistem/veritabani.php'; // eksikse eklenmeli

header('Content-Type: application/json');

// POST verileri alınır
$content_id = intval($_POST['content_id'] ?? 0);
$message    = trim($_POST['message'] ?? '');
$user_id    = $_SESSION['user_id'] ?? 0;

// Geçersiz veri kontrolü
if ($content_id <= 0 || $user_id <= 0 || $message === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Geçersiz veri.'
    ]);
    exit;
}

try {
    // Yorum eklenir
    $stmt = $db->prepare("
        INSERT INTO community_comments (content_id, user_id, comment, created_at) 
        VALUES (?, ?, ?, NOW())
    ");
    $stmt->execute([$content_id, $user_id, $message]);

    // Başarılı dönüş
    echo json_encode([
        'success' => true,
        'last_id' => (int) $db->lastInsertId()
    ]);
} catch (PDOException $e) {
    // Hata durumunda loglama ve yanıt
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Veritabanı hatası.',
        'error' => $e->getMessage() // canlı sistemde gösterilmemesi önerilir
    ]);
}
