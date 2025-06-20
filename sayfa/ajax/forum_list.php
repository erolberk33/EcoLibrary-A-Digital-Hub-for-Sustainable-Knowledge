<?php

$login_id = $_SESSION['login']['id'];
$role = $_SESSION['login']['role'];

$id = $_GET['id'];
?>

<style>
    .fixed-chat-input {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #f8f9fa;
        padding: 20px 0;
        border-top: 1px solid #dee2e6;
        z-index: 999;
    }

    .btn-xl {
        padding: 0.75rem 2rem;
        font-size: 1.25rem;
        border-radius: 0.5rem;
    }

    body {
        padding-bottom: 240px;
    }

    .chat-scroll-area {
        position: relative;
        overflow-y: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        border: 0px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        height: calc(100vh - 680px);
        /* ekran yüksekliÄÂi - baÅÂlÄ±k alanÄ± ve input formu */
    }


    .chat-scroll-area::-webkit-scrollbar {
        display: none;
    }
</style>

<?php

$db->sql = "SELECT 
    community_comments.*, 
    community_contents.content_primary,
    community_topics.title,
    users.username, 
    users.email,
    users.created_at AS user_created_at,
    dosya.dosya_adi AS user_image
FROM community_comments
LEFT JOIN community_contents ON community_contents.id = community_comments.content_id
LEFT JOIN community_topics ON community_topics.id = community_contents.topic_id
LEFT JOIN users ON community_comments.user_id = users.id
LEFT JOIN dosya ON dosya.alt_id = users.id AND dosya.yer = 'user'
WHERE community_comments.content_id = '$id'
ORDER BY community_comments.created_at DESC";

$chats = $db->select();

?>

<?php if ($chats && count($chats) > 0): ?>
    <?php $first = $chats[0]; ?>
<?php else: ?>
    <?php
    // EÄÂer hiç yorum yoksa yine de baÅÂlÄ±k ve formu göstermek için baÅÂlÄ±k bilgilerini al
    $db->sql = "SELECT 
        community_contents.content_primary,
        community_topics.title,
        users.username,
        community_contents.created_at,
        community_contents.topic_id
    FROM community_contents
    LEFT JOIN community_topics ON community_topics.id = community_contents.topic_id
    LEFT JOIN users ON community_contents.user_id = users.id
   
    WHERE community_contents.id = '$id'
    LIMIT 1";
    $first = $db->select()[0];
?>
<?php endif; ?>


<?php
$db->sql = "SELECT 
    community_comments.*, 
    community_contents.content_primary,
    community_topics.title,
    users.username, 
    users.email,
    users.created_at AS user_created_at,
    dosya.dosya_adi AS user_image
FROM community_comments
LEFT JOIN community_contents ON community_contents.id = community_comments.content_id
LEFT JOIN community_topics ON community_topics.id = community_contents.topic_id
LEFT JOIN users ON community_comments.user_id = users.id
LEFT JOIN dosya ON dosya.alt_id = users.id AND dosya.yer = 'user'
WHERE community_comments.content_id = '$id'
ORDER BY community_comments.created_at DESC";

$file = $db->select();

// En yüksek ID’yi bul ve $a1’e ata
$a1 = 0;
if ($file && count($file) > 0) {
    foreach ($file as $chat) {
        if ($chat->id > $a1) {
            $a1 = $chat->id;
            $a1++;
        }
    }
}
?>
<div class="container mt-0">
    <!-- Forum BaÅÂlÄ±k AlanÄ± -->
    <div class="mb-4 border-bottom pb-3">
        <h1 class="fw-bold"><?php echo htmlspecialchars($first->title); ?></h1>
        <p class="text-muted mb-1"><?php echo htmlspecialchars($first->content_primary); ?></p>
        <small class="text-secondary">
            Creation Date: <?php echo date("d.m.Y", strtotime($first->created_at)); ?> –
            Created by: <strong><?php echo htmlspecialchars($first->username); ?></strong>
        </small>
    </div>

    <!-- Scrollable Alan -->
    <div class="chat-scroll-area" id="chatScroll">
        <?php if ($chats && count($chats) > 0): ?>
            <?php foreach ($chats as $value): ?>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex">
                        <div class="me-3 text-center" style="min-width: 120px;">
                            <?php
                            // KullanÄ±cÄ±ya ait görsel varsa onu, yoksa varsayÄ±lanÄ± kullan
                            $imagePath = (!empty($value->user_image))
                                ? 'uploads/user/' . $value->user_image
                                : './lib/assets/img/users.jpg';
                            ?>
                            <img src="<?php echo $imagePath; ?>" alt="Author" class="avatar shadow object-fit-cover" width="80"
                                height="80">

                            <div class="fw-bold mt-2"><?php echo htmlspecialchars($value->username); ?></div>
                            <small class="text-muted">
                                <?php echo htmlspecialchars($value->email); ?><br>
                                <?php echo date("d.m.Y", strtotime($value->user_created_at)); ?>
                            </small>
                        </div>

                        <div class="flex-grow-1">
                            <p class="mb-2"><?php echo nl2br(htmlspecialchars($value->comment)); ?></p>

                            <div class="mb-1">
                                <?php
                                // Bu yorum satÄ±rÄ±na ait tüm 'chats' dosyalarÄ±nÄ± çek
                                $stmt = $db->prepare("SELECT * FROM dosya WHERE alt_id = ? AND yer = 'chats'");
                                $stmt->execute([$value->id]);
                                $chat_files = $stmt->fetchAll(PDO::FETCH_OBJ);
                                ?>

                                <?php if (!empty($chat_files)): ?>
                                    <?php foreach ($chat_files as $file): ?>
                                        <?php
                                        $filename = $file->dosya_adi; // orijinal dosya adÄ±
                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                        // Ä°zin verilen uzantÄ±larla kontrol
                                        $allowed = ['jpg', 'png', 'pdf', 'doc', 'docx'];

                                        if (in_array(strtolower($ext), $allowed)) {
                                            $filepath = '/uploads/chats/' . rawurlencode($filename); // orijinal adla path oluÅÂtur
                                            ?>
                                            <a href="<?php echo $filepath; ?>" class="badge bg-secondary me-2" target="_blank"
                                                rel="noopener noreferrer">
                                                <!-- <?php echo htmlspecialchars($filename); ?> -->
                                                File
                                            </a>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>





                            <small class="text-muted d-block mt-2 d-flex flex-row-reverse">
                                Published: <?php echo date("d.m.Y - H:i", strtotime($value->created_at)); ?>
                            </small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center text-muted my-5">
                <p><strong>No one has started a chat yet.</strong></p>
                <p>How about you make the first comment?</p>
            </div>
        <?php endif; ?>

        <div id="scrollEndMessage" class="text-center text-muted py-2" style="display: none;">
            <strong>You have reached the end of the page.</strong><br>
            There is no more content.
        </div>
    </div>

    <!-- ðÂÂÂ Sabit Sohbet GiriÅÂ AlanÄ± -->
    <div class="fixed-chat-input">
        <div class="container">
            <form id="commentForm" method="POST" action="index.php?url=tools/insert_comment"
                enctype="multipart/form-data">
                <input type="hidden" name="topic_id" value="<?php echo $first->topic_id; ?>">
                <input type="hidden" name="content_id" value="<?php echo $id; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['login']['id']; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="chats_id" value="<?php echo $a1; ?>">

                <div class="form-group mb-3">
                    <label for="messageText">Your message</label>
                    <textarea class="form-control" id="messageText" name="comment" rows="5"
                        placeholder="Write your message..." required></textarea>
                </div>

                <label class="form-label">Add File</label>

               <div class="row">
                    <!-- Dosya Yükleme Tetikleyici -->
                    <div class="col-12 col-sm-12 col-md-12 text-center p-2"
                        <?php if ($a1 != 0): ?>
                            onclick="$('#dosya').click();"
                        <?php else: ?>
                            style="cursor: not-allowed; opacity: 0.6;"
                        <?php endif; ?>
                    >
                        <div class="bg-secondary text-light rounded zoom-hover">
                            <i class="fas fa-folder-plus"></i> <br>
                            Add Image
                        </div>
                    </div>

                    <!-- Gizli dosya inputu -->
                    <input type="file" id="dosya"
                        style="display: none;"
                        <?php if ($a1 == 0) echo 'disabled'; ?>
                        onchange="dosyaGonderChat('chats', <?php echo $a1; ?>, '<?php echo $id; ?>', 'kaydet', 'chats');">
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-xl">Send</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Scroll mesaj kontrolü
        const scrollArea = document.getElementById('chatScroll');
        const endMessage = document.getElementById('scrollEndMessage');
        scrollArea.addEventListener('scroll', () => {
            const atBottom = scrollArea.scrollTop + scrollArea.clientHeight >= scrollArea.scrollHeight - 5;
            endMessage.style.display = atBottom ? 'block' : 'none';
        });



    </script>
