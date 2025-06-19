<?php
session_start();

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header("Location: index.php?url=Forum");
    exit;
}

$id = intval($_POST['id']);

try {
    $db = new PDO("mysql:host=localhost;dbname=ecolibrary;charset=utf8mb4", "root", "12345678");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $comment = trim($_POST['comment'] ?? '');
    $topic_id = intval($_POST['topic_id'] ?? 0);
    $id = intval($_POST['id'] ?? 0);
    $content_id = intval($_POST['content_id'] ?? 0);
    $user_id = intval($_POST['user_id'] ?? 0);
    $created_at = date('Y-m-d H:i:s');

    if (empty($comment) || !$topic_id || !$content_id || !$user_id) {
        header("Location: index.php?url=Forum");
        exit;
    }

    $stmt = $db->prepare("INSERT INTO community_comments (topic_id, content_id, user_id, comment, created_at) VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([$topic_id, $content_id, $user_id, $comment, $created_at]);

    if ($result) {
        // Yorumla bağlantılı dosyaları sil
        // $deleteStmt = $db->prepare("DELETE FROM dosya WHERE  alt_id= ? AND ust_id = ? AND yer = 'chats'");
        // $deleteStmt->execute([$id, $content_id]);


        // İçeriğin tarihini güncelle
        $updateStmt = $db->prepare("UPDATE community_contents SET created_at = ? WHERE id = ?");
        $updateStmt->execute([$created_at, $content_id]);
    }

    header("Location: index.php?url=tools/load_comments&content_id=" . urlencode($content_id));
    exit;
} catch (PDOException $e) {
    header("Location: index.php?url=tools/load_comments&content_id=" . urlencode($content_id));
    exit;
}
