<main class="container">
    <?php
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $news_detail = [];

    if ($id > 0) {
        $db->sql = "SELECT news.*, dosya.*
                FROM news
                LEFT JOIN dosya ON dosya.alt_id = news.id
                WHERE news.id = " . intval($id);
        $news_detail = $db->select();
    }

    // Kapak (0), orta (1), alt1 (2), alt2 (3)
    function getImageData($data, $index)
    {
        if (!empty($data[$index]->dosya_adi)) {
            return [
                'src' => 'uploads/news/' . trim($data[$index]->dosya_adi),
                'style' => ''
            ];
        }
        return [
            'src' => '',
            'style' => 'display: none;'
        ];
    }

    $img1 = getImageData($news_detail, 0); // kapak
    $imgMiddle = getImageData($news_detail, 1); // ortadaki
    $imgBottom1 = getImageData($news_detail, 2); // alttaki 1
    $imgBottom2 = getImageData($news_detail, 3); // alttaki 2
    
    $title = !empty($news_detail[0]->title) ? htmlspecialchars($news_detail[0]->title) : 'Başlık Yok';
    $subheading_1 = !empty($news_detail[0]->subheading_1) ? $news_detail[0]->subheading_1 : '';
    $subheading_2 = !empty($news_detail[0]->subheading_2) ? $news_detail[0]->subheading_2 : '';
    $subheading_3 = !empty($news_detail[0]->subheading_3) ? $news_detail[0]->subheading_3 : '';

    $content_1 = !empty($news_detail[0]->content_1) ? $news_detail[0]->content_1 : '';
    $content_2 = !empty($news_detail[0]->content_2) ? $news_detail[0]->content_2 : '';
    $content_3 = !empty($news_detail[0]->content_3) ? $news_detail[0]->content_3 : '';
    $author = !empty($news_detail[0]->author) ? htmlspecialchars($news_detail[0]->author) : 'Yazar Bilgisi Yok';
    $category = !empty($news_detail[0]->category) ? htmlspecialchars($news_detail[0]->category) : 'Category Bilgisi Yok';
    $created_at = !empty($news_detail[0]->created_at) ? htmlspecialchars($news_detail[0]->created_at) : 'Tarih Bilgisi Yok';
    ?>

    <!-- Kapak Görseli -->
    <div class="mb-4 rounded bg-body-secondary" style="height: 300px; overflow: hidden; <?php echo $img1['style']; ?>">
        <img src="<?php echo $img1['src']; ?>" alt="Kapak Görseli"
            style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <!-- Ana İçerik -->
    <div class="row g-5">
        <div class="col-md-8">
            <article class="blog-post">
                <h2 class="display-5 mb-1"><?php echo $title; ?></h2>
                <p class="blog-post-meta d-flex justify-content-between">
                    <span class="text-start"><?php echo $author; ?></span>
                    <span class="text-end"><?php echo $created_at . ' - ' . $category; ?></span>
                </p>

                </p>
                <hr>
                <!-- İLK KISIM -->
                <b><?php echo nl2br(htmlspecialchars($subheading_1)); ?></b><br>
                <p><?php echo nl2br(htmlspecialchars(wordwrap($content_1, 90, "\n", true))); ?></p>


                <!-- Ortadaki Görsel -->
                <div class="float-start me-3 mb-3" style="width: 60%; <?php echo $imgMiddle['style']; ?>">
                    <img src="<?php echo $imgMiddle['src']; ?>" alt="Orta Görsel"
                        style="width: 100%; height: 25vw; object-fit: cover;" class="rounded">
                </div>
                <b><?php echo nl2br(htmlspecialchars($subheading_2)); ?></b><br>
                <!-- <p><?php echo nl2br(htmlspecialchars($content_2)); ?></p> -->
                <p><?php echo nl2br(htmlspecialchars(wordwrap($content_2, 35, "\n", true))); ?></p>
                <div style="clear: both;"></div>
                <b><?php echo nl2br(htmlspecialchars($subheading_3)); ?></b><br>
                <p><?php echo nl2br(htmlspecialchars(wordwrap($content_3, 120, "\n", true))); ?></p>
                <!-- Alt İki Görsel -->
                <div class="row mt-4">
                    <div class="col-6" style="<?php echo $imgBottom1['style']; ?>">
                        <img src="<?php echo $imgBottom1['src']; ?>" alt="Alt Görsel 1"
                            style="width: 100%; height: 15vw; object-fit: cover;" class="rounded">
                    </div>
                    <div class="col-6" style="<?php echo $imgBottom2['style']; ?>">
                        <img src="<?php echo $imgBottom2['src']; ?>" alt="Alt Görsel 2"
                            style="width: 100%; height: 15vw; object-fit: cover;" class="rounded">
                    </div>
                </div>
            </article>
        </div>

        <?php
        // Mevcut sayfa ID'sine sahip olanı hariç tutarak diğer haberleri çek
        $db->sql = "SELECT news.id, news.title, news.created_at, dosya.dosya_adi
            FROM news
            LEFT JOIN dosya ON dosya.alt_id = news.id
            WHERE news.id != " . intval($id) . " 
            GROUP BY news.id
            ORDER BY news.created_at DESC
            LIMIT 3";
        $otherNews = $db->select();
        ?>

        <!-- Sağ Sidebar -->
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div>
                    <h4 class="fst-italic">Son Gönderiler</h4>
                    <ul class="list-unstyled">
                        <?php if (!empty($otherNews)): ?>
                            <?php foreach ($otherNews as $news):
                                $imgFile = !empty($news->dosya_adi) ? trim($news->dosya_adi) : '';
                                $imgPath = (!empty($imgFile) && file_exists('uploads/news/' . $imgFile))
                                    ? 'uploads/news/' . $imgFile
                                    : 'lib/assets/img/noimage.jpg';

                                $title = htmlspecialchars($news->title);
                                $date = !empty($news->created_at) ? date('d.m.Y', strtotime($news->created_at)) : '';
                                $link = 'index.php?url=Home_News&id=' . $news->id;
                                // echo $news->id;
                                ?>
                                <li>
                                    <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                        href="<?php echo $link; ?>">
                                        <img src="<?php echo $imgPath; ?>" alt="Haber görseli"
                                            style="width: 96px; height: 96px; object-fit: cover;" class="rounded">
                                        <div class="col-lg-8">
                                            <h6 class="mb-0"><?php echo $title; ?></h6>
                                            <small class="text-body-secondary"><?php echo $date; ?></small>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="py-2 text-muted">Gösterilecek başka haber bulunamadı.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</main>