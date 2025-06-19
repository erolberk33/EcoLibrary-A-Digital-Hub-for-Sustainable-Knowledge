<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $db = new PDO("mysql:host=localhost;dbname=ecolibrary;charset=utf8mb4", "root", "12345678");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $content_id = intval($_GET['content_id'] ?? 0);

        $stmt = $db->prepare("SELECT 
            community_comments.*, 
            users.username, users.email,
            users.created_at as user_created_at
        FROM community_comments
        LEFT JOIN users ON community_comments.user_id = users.id
        WHERE community_comments.content_id = ?
        ORDER BY community_comments.created_at DESC");

        $stmt->execute([$content_id]);
        $chats = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($chats as $value): ?>

            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex">
                    <div class="me-3 text-center" style="min-width: 120px;">
                        <img src="./lib/assets/img/team-2.jpg" class="avatar shadow" width="50" height="50">
                        <div class="fw-bold"><?= htmlspecialchars($value->username); ?></div>
                        <small class="text-muted">
                            <?= htmlspecialchars($value->email); ?><br>
                            <?= date("d.m.Y", strtotime($value->user_created_at)); ?>
                        </small>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-2"><?= nl2br(htmlspecialchars($value->comment)); ?></p>
                        <?php if (!empty($value->attachment_1)): ?>
                            <div class="mt-3">
                                <span class="badge bg-secondary"><?= htmlspecialchars($value->attachment_1); ?></span>
                            </div>
                        <?php endif; ?>
                        <small class="text-muted d-block mt-2 d-flex flex-row-reverse">
                            Published: <?= date("d.m.Y - H:i", strtotime($value->created_at)); ?>
                        </small>
                    </div>
                </div>
            </div>

        <?php endforeach;

    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">Veritabanı bağlantı hatası: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
} else {
    echo '<div class="alert alert-warning">Geçersiz istek yöntemi.</div>';
}
?>

<script>
    const params = new URLSearchParams(window.location.search);
    const contentId = params.get('content_id');

    if (contentId) {
        // Kısa gecikmeyle Forum sayfasına yönlendir

        window.location.href = 'index.php?url=Forum&content_id=' + contentId;

    } else {
        alert("Geçerli bir içerik ID'si bulunamadı.");
    }
</script>