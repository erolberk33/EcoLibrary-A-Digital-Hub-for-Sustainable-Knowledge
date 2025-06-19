<?php

// ID'yi al
$id = $_REQUEST['id'];

// Eğer ID mevcutsa haber verisini veritabanından çek
if ($id > 0) {
    $db->sql = "SELECT * FROM news WHERE id=" . intval($id);
    $news = $db->select(1);

    // Gelen nesne boşsa hata kontrolü eklenmeli
    $id = $news->id;
    $category = $news->category;
    $title = $news->title;
    $subheading_1 = $news->subheading_1;
    $subheading_2 = $news->subheading_2;
    $subheading_3 = $news->subheading_3;
    $content_1 = $news->content_1;
    $content_2 = $news->content_2;
    $content_3 = $news->content_3;
    $author = $news->author;
    $tags = $news->tags;
    $created_at = $news->created_at;

} else {
    // Yeni kayıt için alanlar boş değerlerle başlatılıyor
    $id = "";
    $category = "";
    $title = "";
    $subheading_1 = "";
    $subheading_2 = "";
    $subheading_3 = "";
    $content_1 = "";
    $content_2 = "";
    $content_3 = "";
    $author = "";
    $tags = "";
    $created_at = "";
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
    <div class="d-flex justify-content-between align-items-center mb-1">
        <label for="subheading_1" class="mb-0">Subheading:</label>
        <button type="button" class="btn btn-outline-success btn-sm px-2 py-1" id="add-subheading"
            title="Alt başlık ekle" style="font-size: 0.8rem;">
            ➕
        </button>
    </div>
    <div id="subheading-container">
        <!-- Var olan alt başlıklar için input alanları -->
        <div class="form-group mb-2">
            <input class="form-control" id="subheading_1" name="subheading_1" placeholder="Enter Subheading 1"
                value="<?php echo htmlspecialchars($subheading_1 ?? ''); ?>">
        </div>
        <?php if (!empty(trim($subheading_2))): ?>
            <div class="form-group mb-2">
                <input class="form-control" id="subheading_2" name="subheading_2" placeholder="Enter Subheading 2"
                    value="<?php echo htmlspecialchars($subheading_2); ?>">
            </div>
            <script>let subheadingCount = 2;</script>
        <?php endif; ?>
        <?php if (!empty(trim($subheading_3))): ?>
            <div class="form-group mb-2">
                <input class="form-control" id="subheading_3" name="subheading_3" placeholder="Enter Subheading 3"
                    value="<?php echo htmlspecialchars($subheading_3); ?>">
            </div>
            <script>subheadingCount = 3;</script>
        <?php endif; ?>
    </div>
    <div class="alert alert-warning mt-2 py-2 px-3 text-dark" id="subheading-warning" style="display: none;">
        You cannot add more subheadings.
    </div>

    <!-- İÇERİK ALANLARI -->
    <hr>
    <div class="d-flex justify-content-between align-items-center mb-1">
        <label for="content_1" class="mb-0 fw-bold">Content:</label>
        <button type="button" class="btn btn-outline-success btn-sm px-2 py-1" id="add-content" title="İçerik ekle"
            style="font-size: 0.8rem;">
            ➕
        </button>
    </div>
    <div id="content-container">
        <div class="form-group mb-2">
            <textarea class="form-control" id="content_1" name="content_1" rows="6"
                placeholder="Enter content 1..."><?php echo htmlspecialchars($content_1 ?? ''); ?></textarea>
        </div>
        <?php if (!empty(trim($content_2))): ?>
            <div class="form-group mb-2">
                <textarea class="form-control" id="content_2" name="content_2" rows="6"
                    placeholder="Enter content 2..."><?php echo htmlspecialchars($content_2); ?></textarea>
            </div>
            <script>let contentCount = 2;</script>
        <?php endif; ?>
        <?php if (!empty(trim($content_3))): ?>
            <div class="form-group mb-2">
                <textarea class="form-control" id="content_3" name="content_3" rows="6"
                    placeholder="Enter content 3..."><?php echo htmlspecialchars($content_3); ?></textarea>
            </div>
            <script>contentCount = 3;</script>
        <?php endif; ?>
    </div>
    <div class="alert alert-warning mt-2 py-2 px-3 text-dark" id="content-warning" style="display: none;">
        You cannot add more content fields.
    </div>

    <!-- KATEGORİ VE YAZAR ALANLARI -->
    <div class="col-4 col-md-4">
        <span>Category :</span>
        <div class="form-group">
            <input list="categoryList" class="form-control" id="category" name="category"
                placeholder="Select a Category" value="<?php echo htmlspecialchars($category); ?>">
            <datalist id="categoryList">
                <?php
                $db->sql = "SELECT DISTINCT category FROM news ORDER BY category ASC";
                $categories = $db->select();
                if ($categories) {
                    foreach ($categories as $cat) {
                        echo '<option value="' . htmlspecialchars($cat->category) . '">';
                    }
                }
                ?>
            </datalist>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <span>Author :</span>
        <div class="form-group">
            <input list="authorList" class="form-control" id="author" name="author" placeholder="Enter Author"
                value="<?php echo htmlspecialchars($author); ?>">
            <datalist id="authorList">
                <?php
                $db->sql = "SELECT DISTINCT author FROM news ORDER BY author ASC";
                $authors = $db->select();
                if ($authors) {
                    foreach ($authors as $a) {
                        echo '<option value="' . htmlspecialchars($a->author) . '">';
                    }
                }
                ?>
            </datalist>
        </div>
    </div>

    <!-- ETİKETLER ALANI -->
    <div class="col-12 col-md-4">
        <span>Tags :</span>
        <div class="form-group">
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Tags"
                value="<?php echo htmlspecialchars($tags); ?>">
        </div>
    </div>

    <!-- GÖRSEL YÜkleme -->
    <?php
    $file_count = 0;
    if ($id > 0) {
        ?>
        <div class="col-12 mt-2 mb-2">
            <div class="row">
                <!-- Dosya Yükleme Tetikleyici -->
                <div class="col-12 col-sm-12 col-md-12 text-center p-2 " onclick="$('#dosya').click();">
                    <div class="bg-secondary text-light rounded zoom-hover">
                        <i class="fas fa-folder-plus "></i> <br>
                        Add Image
                    </div>
                </div>

                <!-- Gizli dosya inputu -->
                <input type="file" id="dosya" style="display: none;" onchange="dosyaGonder('news', <?php echo $id; ?>, 'kaydet', 'news');">

                <?php
                $db->sql = "SELECT * FROM dosya WHERE yer='news' AND alt_id=$id";
                $imgs = $db->select();
                if ($imgs && $id > 0) {
                    $file_count = 1;
                    foreach ($imgs as $value) { ?>
                        <div class="col-6 col-sm-4 col-md-4 text-right p-2" id="dos_id_<?php echo $value->id; ?>">
                            <div class="bg-dark rounded cursor-pointer text-center" style="overflow: hidden;" onclick="$('#dosil_<?php echo $value->id; ?>').toggle('fast');">
                                <br>
                                <img src="uploads/news/<?php echo $value->dosya_adi; ?>" alt="" style="width: 80px; height: 80px;">
                            </div>
                            <div id="dosil_<?php echo $value->id; ?>" style="display: none;">
                                <a href="<?php echo 'uploads/' . $value->yer . '/' . $value->dosya_adi; ?>" download>
                                    <i class="fa fa-download text-primary zoom-hover"></i>
                                </a>
                                <i class="fa fa-trash text-danger zoom-hover" onclick="$('#dos_id_<?php echo $value->id; ?>').hide('fast'); var b = 'id=<?php echo ($value->id * -1); ?>&tablo_adi=dosya'; kaydet(b,0);"></i>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    <?php } ?>

    <!-- GİZLİ ALANLAR -->
    <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
    <input type="hidden" id="file_count" value="<?php echo $file_count; ?>">
    <input type="hidden" name="id" id="news_id" value="<?php echo htmlspecialchars($_REQUEST['id']); ?>">
    <input type="hidden" name="tablo_adi" value="news">
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

<script>
    if (typeof subheadingCount === 'undefined') subheadingCount = 1;
    const maxSubheadings = 3;
    document.getElementById('add-subheading').addEventListener('click', function () {
        if (subheadingCount >= maxSubheadings) {
            document.getElementById('subheading-warning').style.display = 'block';
            return;
        }
        subheadingCount++;
        const container = document.getElementById('subheading-container');
        const inputDiv = document.createElement('div');
        inputDiv.classList.add('form-group', 'mb-2');
        inputDiv.innerHTML = `<input class="form-control" id="subheading_${subheadingCount}" name="subheading_${subheadingCount}" placeholder="Enter Subheading ${subheadingCount}">`;
        container.appendChild(inputDiv);
    });

    if (typeof contentCount === 'undefined') contentCount = 1;
    const maxContentAreas = 3;
    document.getElementById('add-content').addEventListener('click', function () {
        if (contentCount >= maxContentAreas) {
            document.getElementById('content-warning').style.display = 'block';
            return;
        }
        contentCount++;
        const container = document.getElementById('content-container');
        const textareaDiv = document.createElement('div');
        textareaDiv.classList.add('form-group', 'mb-2');
        textareaDiv.innerHTML = `<textarea class="form-control" id="content_${contentCount}" name="content_${contentCount}" rows="6" placeholder="Enter content ${contentCount}..."></textarea>`;
        container.appendChild(textareaDiv);
    });
</script>
