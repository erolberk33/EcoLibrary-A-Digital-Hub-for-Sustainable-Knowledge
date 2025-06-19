<div class="container">
    <h1>All News</h1><br>
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
        <?php
        $db->sql = "SELECT d.*, n.*
            FROM dosya d
            INNER JOIN news n ON d.alt_id = n.id
            WHERE d.yer = 'news'
            AND d.id IN (
                SELECT MAX(id)
                FROM dosya
                WHERE yer = 'news'
                GROUP BY alt_id
            ) 
        ";
        $allNews = $db->select();

        if (is_array($allNews) && count($allNews) > 0) {
            $news = $allNews; // Artık tüm haberleri getiriyoruz
        
            foreach ($news as $typenews) {
                $img = (!empty($typenews->dosya_adi) && file_exists('uploads/news/' . trim($typenews->dosya_adi)))
                    ? 'uploads/news/' . trim($typenews->dosya_adi)
                    : './lib/assets/img/noimage.jpg';
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block">
                                <img src="<?php echo $img; ?>" class="img-fluid border-radius-lg"
                                    alt="<?php echo htmlspecialchars($typenews->title); ?>"
                                    style="max-height: 200px; object-fit: cover; width: 100%;">
                            </a>
                        </div>

                        <div class="card-body pt-2">
                            <a href="index.php?url=Home_News&id=<?php echo $typenews->id; ?>"
                                class="card-title h5 d-block text-darker">
                                <?php echo htmlspecialchars($typenews->title); ?>
                            </a>
                            <p class="card-description mb-4">
                                <?php echo mb_strimwidth(htmlspecialchars($typenews->content_1), 0, 100, '...'); ?>
                            </p>
                            <div class="author align-items-center d-flex">
                                <img src="./lib/assets/img/team-2.jpg" alt="Author" class="avatar shadow" width="50px"
                                    height="50px">
                                <div class="name ps-3">
                                    <b><?php echo !empty($typenews->author) ? htmlspecialchars($typenews->author) : 'UNDEFINED'; ?></b>
                                    <div class="stats">
                                        <small>
                                            <?php echo date('d M Y', strtotime($typenews->created_at ?? 'now')); ?>
                                            - <?php echo htmlspecialchars($typenews->category ?? ''); ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>No glass records found.</p>";
        }
        ?>
    </div>
</div>