<?php

// ID'yi al
$id = $_REQUEST['id'];

// Eğer ID mevcutsa haber verisini veritabanından çek
if ($id > 0) {
    $db->sql = "SELECT * FROM community_topics WHERE id=" . intval($id);
    $topics = $db->select(1);

    // Gelen nesne boşsa hata kontrolü eklenmeli
    $id = $topics->id;
    $title = $topics->title;
    $subtitle = $topics->subtitle;
} else {
    // Yeni kayıt için alanlar boş değerlerle başlatılıyor
    $id = "";
    $title = "";
    $subtitle = "";
}
?>

<form id="form1" class="row">
    <!-- BAŞLIK ALANI -->
    <div class="col-8 mx-auto">
        <span>Main Title :</span>
        <div class="form-group">
            <input list="authorList" class="form-control" id="title" name="title" placeholder="Enter Title"
                value="<?php echo htmlspecialchars($title); ?>">
        </div>
    </div>

    <!-- ALT BAŞLIK ALANLARI -->
    <div class="col-8 mx-auto">
        <span>Main Subtitle :</span>
        <div class="form-group">
            <input list="authorList" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Subtitle"
                value="<?php echo htmlspecialchars($subtitle); ?>">
        </div>
    </div>

    <input type="hidden" name="id" id="topics_id" value="<?php echo htmlspecialchars($_REQUEST['id']); ?>">
    <input type="hidden" name="tablo_adi" value="community_topics">

</form>

<!-- MODAL BUTONLAR -->
<div class="row">
    <div class="col-12 border mb-1"></div>
    <div class="col-12 d-flex justify-content-end">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn bg-gradient-primary" onclick=" 
            kaydet($('#form1').serialize(),<?php echo $id == 0 ? 1 : 0; ?>),  
            $('#example').load('index.php?url=ajax/topics_list', 
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

 