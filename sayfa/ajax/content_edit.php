<?php

// ID'yi al
$id = $_REQUEST['id'];
$login_id = $_SESSION['login']['id'];

// Eğer ID mevcutsa haber verisini veritabanından çek
if ($id > 0) {
    $db->sql = "SELECT * FROM community_contents 
    -- LEFT JOIN community_topics ON community_contents.topic_id = community_topics.id
    WHERE id=" . intval($id);
    $contents = $db->select(1);

    // Gelen nesne boşsa hata kontrolü eklenmeli
    $id = $contents->id;
    $topic_id = $contents->topic_id;
    $content_primary = $contents->content_primary;
    $content_secondary = $contents->content_secondary;
    // $user_id = $contents->user_id;
    // $created_at = $contents->created_at;

} else {
    // Yeni kayıt için alanlar boş değerlerle başlatılıyor
    $id = "";
    $topic_id = "";
    $content_primary = "";
    $content_secondary = "";
    $user_id = "";
    $created_at = "";
}
?>

<form id="form1" class="row">

    <div class="col-12">
        <span>Title :</span>
        <div class="form-group">
            <select class="form-control select2" name="topic_id" id="topic_id">
                <?php
                $db->sql = "SELECT * FROM community_topics";
                $topics = $db->select();
                foreach ($topics as $key => $value) { ?>

                    <option value="<?php echo $value->id; ?>" <?php echo $value->id == $topic_id ? ' selected ' : ''; ?>>
                        <?php echo $value->title; ?>
                    </option>

                <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-12">
        <span>Content Primary :</span>
        <div class="form-group">
            <input list="authorList" class="form-control" id="content_primary" name="content_primary"
                placeholder="Enter Content Primary" value="<?php echo htmlspecialchars($content_primary ?? ''); ?>">

        </div>
    </div>


    <div class="col-12">
        <span>Content Secondary :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="content_secondary" name="content_secondary"
                placeholder="Enter Content Secondary" value="<?php echo htmlspecialchars($content_secondary ?? ''); ?>">
        </div>
    </div>


    <!-- GİZLİ ALANLAR -->
    <?php if (empty($id)) { ?>
        <input type="hidden" name="user_id" id="user_id" value="<?php echo htmlspecialchars($login_id); ?>">
        <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
    <?php } ?>

    <input type="hidden" name="id" id="content_id" value="<?php echo htmlspecialchars($_REQUEST['id']); ?>">
    <input type="hidden" name="tablo_adi" value="community_contents">
</form>

<!-- MODAL BUTONLAR -->
<div class="row">
    <div class="col-12 border mb-1"></div>
    <div class="col-12 d-flex justify-content-end">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn bg-gradient-primary" onclick=" 
            kaydet($('#form1').serialize(),<?php echo $id == 0 ? 1 : 0; ?>),  
            $('#example').load('index.php?url=ajax/news_list', 
                function() {
                    setTimeout(function() {
                        location.reload();
                    }, 600000);
                });
            $('#exampleModal').modal('hide');
            location.reload();
        ">Save</button>
    </div>
</div>
