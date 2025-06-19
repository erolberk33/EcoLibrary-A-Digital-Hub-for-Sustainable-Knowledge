<?php
require_once 'sistem/veritabani.php';

$content_id = intval($_GET['content_id'] ?? 0);
if ($content_id <= 0) {
    echo 0;
    exit;
}

try {
    $stmt = $db->prepare("SELECT MAX(id) AS last_id FROM community_comments WHERE content_id = ?");
    $stmt->execute([$content_id]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    echo isset($result->last_id) ? (int) $result->last_id : 0;
} catch (PDOException $e) {
    echo 0;
}
