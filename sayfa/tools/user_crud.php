<?php
header('Content-Type: application/json');

// 1. ID ve tablo adı kontrolü
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Geçerli bir ID gönderilmedi.']);
    exit;
}

$id = (int) $_POST['id'];
$tablo = $_POST['tablo_adi'] ?? '';
if ($tablo !== 'users') {
    echo json_encode(['success' => false, 'message' => 'Geçersiz tablo adı.']);
    exit;
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=ecolibrary;charset=utf8mb4", "root", "12345678");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($id < 0) {
        // Silme işlemi
        $id *= -1;
        $stmt = $pdo->prepare("DELETE FROM $tablo WHERE id = ?");
        $success = $stmt->execute([$id]);
        $message = $success ? "Kullanıcı başarıyla silindi." : "Silme işlemi başarısız.";
    } else {
        // Onaylama işlemi
        $stmt = $pdo->prepare("UPDATE $tablo SET role = 1 WHERE id = ?");
        $success = $stmt->execute([$id]);
        $message = $success ? "Kullanıcı başarıyla onaylandı." : "Onaylama işlemi başarısız.";
    }

    echo json_encode(['success' => $success, 'message' => $message]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
}
?>
