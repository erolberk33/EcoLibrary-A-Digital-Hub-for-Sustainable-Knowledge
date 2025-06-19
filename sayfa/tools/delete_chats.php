<?php
header('Content-Type: application/json');
ob_clean();

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Geçerli bir ID gönderilmedi.'
    ]);
    exit;
}

$id = intval($_POST['id']);

try {
    // 1. Veritabanı bağlantısı
    $db = new PDO(
        "mysql:host=localhost;dbname=ecolibrary;charset=utf8mb4",
        "root",
        "12345678"
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Dosya adlarını çek (ust_id = $id ve yer = 'chats')
    $stmtSelect = $db->prepare("SELECT dosya_adi FROM dosya WHERE LOWER(yer) = 'chats' AND ust_id = :id");
    $stmtSelect->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtSelect->execute();
    $files = $stmtSelect->fetchAll(PDO::FETCH_COLUMN);

    // 3. Fiziksel dosyaları sil
    $deletedFiles = 0;
    foreach ($files as $fileName) {
        $filePath = __DIR__ . "../digital/uploads/chats/" . $fileName;

        if (file_exists($filePath) && unlink($filePath)) {
            $deletedFiles++;
        }
    }

    // 4. dosya tablosundan sil
    $stmtDeleteDosya = $db->prepare("DELETE FROM dosya WHERE yer = 'chats' AND ust_id = :id");
    $stmtDeleteDosya->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteDosya->execute();
    $deletedDosyaRows = $stmtDeleteDosya->rowCount();

    // 5. community_comments tablosundan sil
    $stmtDeleteComments = $db->prepare("DELETE FROM community_comments WHERE content_id = :id");
    $stmtDeleteComments->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtDeleteComments->execute();
    $deletedComments = $stmtDeleteComments->rowCount();

    // 6. community_contents tablosundan sil
    $stmtDeleteContents = $db->prepare("DELETE FROM community_contents WHERE id = :content_id");
    $stmtDeleteContents->bindParam(':content_id', $id, PDO::PARAM_INT);
    $stmtDeleteContents->execute();
    $deletedContents = $stmtDeleteContents->rowCount();

    // 7. JSON çıktısı
    echo json_encode([
        'success' => true,
        'message' => "Silme tamamlandı. $deletedFiles fiziksel dosya, $deletedDosyaRows dosya kaydı, $deletedComments yorum ve $deletedContents içerik silindi.",
        'deleted_physical_files' => $deletedFiles,
        'deleted_dosya' => $deletedDosyaRows,
        'deleted_comments' => $deletedComments,
        'deleted_contents' => $deletedContents
    ]);
    exit;

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Veritabanı hatası: ' . $e->getMessage()
    ]);
    exit;
}
