<?php
header('Content-Type: application/json');

// 1. ID kontrolü
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Geçerli bir ID gönderilmedi.'
    ]);
    exit;
}

$id = intval($_POST['id']);

try {
    // 2. Veritabanı bağlantısı
    $db = new PDO(
        "mysql:host=localhost;dbname=ecolibrary;charset=utf8mb4",
        "root",
        "12345678"
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 3. Dosya adlarını çek (alt_id = $id ve yer = 'news')
    $stmtSelect = $db->prepare("SELECT dosya_adi FROM dosya WHERE LOWER(yer) = 'news' AND alt_id = :id");
    $stmtSelect->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtSelect->execute();
    $files = $stmtSelect->fetchAll(PDO::FETCH_COLUMN);

    // 4. Fiziksel dosyaları sil (upload/news klasöründen)
    // $deletedFiles = 0;
    // foreach ($files as $fileName) {
    //     $filePath = __DIR__ . "/uploads/news/" . $fileName; // klasör yapısına göre gerekirse düzenle

    //     if (file_exists($filePath) && unlink($filePath)) {
    //         $deletedFiles++;
    //     }
    // }


    // 5. dosya tablosundan sil
    $stmtDeleteDosya = $db->prepare("DELETE FROM dosya WHERE yer = 'news' AND alt_id = :id");
    $stmtDeleteDosya->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteDosya->execute();
    $deletedDosyaRows = $stmtDeleteDosya->rowCount();

    // 6. news tablosundan sil
    $stmtDeleteNews = $db->prepare("DELETE FROM news WHERE id = :id");
    $stmtDeleteNews->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteNews->execute();
    $deletedNewsRows = $stmtDeleteNews->rowCount();

    // 7. JSON çıktısı
    echo json_encode([
        'success' => true,
        'message' => "Silme tamamlandı. $deletedFiles fiziksel dosya, $deletedDosyaRows dosya kaydı ve $deletedNewsRows haber kaydı silindi.",
        'deleted_physical_files' => $deletedFiles,
        'deleted_dosya' => $deletedDosyaRows,
        'deleted_news' => $deletedNewsRows
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
}
?>