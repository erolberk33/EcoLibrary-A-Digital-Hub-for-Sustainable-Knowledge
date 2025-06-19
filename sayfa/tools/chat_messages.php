<?php
require_once 'sistem/veritabani.php';

$content_id = intval($_GET['content_id'] ?? 0);
$last_id = intval($_GET['last_id'] ?? 0);

if ($content_id <= 0)
    exit;

// Yeni yorumları çek (sadece last_id'den büyük olanlar)
$db->sql = "SELECT community_comments.*, users.username, users.email, users.created_at AS user_created_at, 
                   dosya.dosya_adi AS user_image 
            FROM community_comments 
            LEFT JOIN users ON community_comments.user_id = users.id 
            LEFT JOIN dosya ON dosya.alt_id = users.id AND dosya.yer = 'user'
            WHERE community_comments.content_id = ? AND community_comments.id >= ?
            ORDER BY community_comments.id ASC";

$comments = $db->select("", [$content_id, $last_id]);
if (!$comments)
    exit;

foreach ($comments as $value) {
    // Verilerin hazırlanması
    $imagePath = (!empty($value->user_image)) ? 'uploads/user/' . $value->user_image : './lib/assets/img/user.jpg';
    $username = htmlspecialchars($value->username);
    $email = htmlspecialchars($value->email);
    $userCreated = date("d.m.Y", strtotime($value->user_created_at));
    $comment = nl2br(htmlspecialchars($value->comment));
    $publishedAt = date("d.m.Y - H:i", strtotime($value->created_at));

    // Dosya kontrolü
    $stmt = $db->prepare("SELECT * FROM dosya WHERE alt_id = ? AND ust_id = ? AND yer = 'chats'");
    $stmt->execute([$value->id, $content_id]);
    $chat_files = $stmt->fetchAll(PDO::FETCH_OBJ);

    $fileLinks = '';
    $allowed = ['jpg', 'png', 'pdf', 'doc', 'docx'];
    if (!empty($chat_files)) {
        foreach ($chat_files as $file) {
            $filename = $file->dosya_adi;
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array(strtolower($ext), $allowed)) {
                $filepath = '/digital/uploads/chats/' . rawurlencode($filename);
                $fileLinks .= "<a href='{$filepath}' class='badge bg-secondary me-2' target='_blank' rel='noopener noreferrer'>File</a>";
            }
        }
    }

    // HTML çıktısı
    echo "
    <div class='card mb-3 shadow-sm' data-id='{$value->id}'>
        <div class='card-body d-flex'>
            <div class='me-3 text-center' style='min-width: 120px;'>
                <img src='{$imagePath}' alt='Author' class='avatar shadow object-fit-cover' width='80' height='80'>
                <div class='fw-bold mt-2'>{$username}</div>
                <small class='text-muted'>{$email}<br>{$userCreated}</small>
            </div>
            <div class='flex-grow-1'>
                <p class='mb-2'>{$comment}</p>
                <div class='mb-1'>{$fileLinks}</div>
                <small class='text-muted d-block mt-2 d-flex flex-row-reverse'>Published: {$publishedAt}</small>
            </div>
        </div>
    </div>
    ";
}
