<?php $id = $_SESSION['login']['id'];
$role = $_SESSION['login']['role'];
?>
<?php
$db->sql = "SELECT * FROM users WHERE id=" . $id;
$settings = $db->select(1);


if ($settings) {

    ?>

    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('./lib/assets/img/curved-images/curved14.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <?php
                $user_detail = [];

                if ($id > 0) {
                    $db->sql = "SELECT users.*, dosya.*
                    FROM users
                    LEFT JOIN dosya ON dosya.alt_id = users.id
                    WHERE users.id = $id";
                    $user_detail = $db->select();
                }

                function getImageData($data, $index)
                {
                    if (isset($data[$index]) && !empty($data[$index]->dosya_adi)) {
                        return [
                            'src' => 'uploads/user/' . trim($data[$index]->dosya_adi),
                            'hasImage' => true
                        ];
                    }
                    return [
                        'src' => '',
                        'hasImage' => false
                    ];
                }

                $img1 = getImageData($user_detail, 0);
                ?>

                <div
                    class="avatar avatar-xl position-relative w-150 h-150 d-flex justify-content-center align-items-center bg-light rounded-circle shadow-sm">
                    <?php if ($img1['hasImage']) { ?>
                        <img src="<?php echo $img1['src']; ?>" alt="profile_image"
                            class="w-100 h-100 object-fit-cover border-radius-lg">
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="64" height="64" fill="#6c757d">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                        </svg>
                    <?php } ?>
                </div>
            </div>


            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">

                        <?php $first_name = $_SESSION['login']['first_name']; ?>
                        <?php $last_name = $_SESSION['login']['last_name']; ?>
                        <?php echo strtoupper($first_name) ?: '' ?>     <?php echo strtoupper($last_name) ?: '' ?>

                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <!-- <?php $username = $_SESSION['login']['email']; ?> -->
                        <?php echo $username; ?>

                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>


    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Platform Settings</h6>
                </div>
                <div class="card-body p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">Bill</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault">Send email when someone follows me</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1"
                                    checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault1">Send an email when someone replies to my post</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2"
                                    checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault2">Send an email when someone mentions me</label>
                            </div>
                        </li>
                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault3">New Features and Announcements</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4"
                                    checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault4">Monthly Updates</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0 pb-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5"
                                    checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                    for="flexSwitchCheckDefault5">Subscribe to the Newsletter</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a type="button" class="btn btn-outline-white " onclick="
            $('#exampleModal').modal('show');
            $('#exampleModalLabel').text('Profile Update');
            $('#duzenle').load('index.php?url=ajax/settings_edit&id=<?php echo $settings->id; ?>');
            ">
                                <i class="fas fa-user-edit text-white text-sm" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card-body p-3">
                    <!-- <p class="text-sm">
                        <?php
                        $roleText = ($settings->role == 1) ? 'User' : (($settings->role == 2) ? 'Admin' : 'Unknown');
                        echo $settings->role . ' - ' . $roleText;
                        ?>

                    </p> -->
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name Surname
                                :</strong>
                            &nbsp; <?php echo $settings->first_name; ?>     <?php echo $settings->last_name; ?></li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Username :</strong>
                            &nbsp; <?php echo $settings->username; ?> </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                            &nbsp; <?php echo $settings->email; ?> </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Phone :</strong>
                            &nbsp; <?php echo $settings->phone_number; ?> </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">User Role:</strong>
                            &nbsp;
                            <?php
                            if ($settings->role == 1) {
                                echo "Member";
                            } elseif ($settings->role == 2) {
                                echo "Admin";
                            } else {
                                echo "Unknown Role";
                            }
                            ?>
                        </li>

                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">Membership Date:</strong>
                            &nbsp;
                            <?php
                            echo date('d-m-Y', strtotime($settings->created_at));
                            ?>
                        </li>

                        <!-- <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <?php
        if ($role == 2) {
            // Yönetici rolü için yeni üyeleri butonlarla göster
            ?>
            <div class="col-12 col-xl-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Those Who Want to Become New Members...</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <?php
                            $db->sql = "SELECT * FROM users WHERE role = 0 ORDER BY created_at DESC LIMIT 5";
                            $users = $db->select();

                            if ($users && count($users) > 0) {
                                foreach ($users as $user) { ?>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="./lib/assets/img/users.jpg" alt="kal" class="border-radius-lg shadow">

                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user->username); ?></h6>
                                            <p class="mb-0 text-xs"><?php echo htmlspecialchars($user->email); ?></p>
                                        </div>

                                        <div class="ms-auto d-flex gap-1">
                                            <button type="button" class="btn btn-outline-secondary m-0" onclick="
                                        $('#exampleModal').modal('show');
                                        $('#exampleModalLabel').text('User Update Form');
                                        $('#duzenle').load('index.php?url=ajax/settings_edit_admin&id=<?php echo $user->id; ?>');
                                    ">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger m-0"
                                                onclick="deleteNews(<?php echo $user->id; ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </li>
                                <?php }
                            } else {
                                echo '<li class="list-group-item">No users found.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        } elseif ($role == 1) {
            // Üye rolü için yeni üyeler listesini butonsuz göster
            ?>
            <div class="col-12 col-xl-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">New Members in the Community</h6>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-group">
                            <?php
                            // Kullanıcıları ve varsa görsellerini çek
                            $db->sql = "
                    SELECT 
                        users.*, 
                        dosya.dosya_adi 
                    FROM users 
                    LEFT JOIN dosya ON dosya.alt_id = users.id 
                    WHERE users.role = 0 
                    ORDER BY users.created_at DESC 
                    LIMIT 5
                ";
                            $members = $db->select();

                            if ($members && count($members) > 0) {
                                foreach ($members as $member) {
                                    // Görsel yolu: varsa dosya.dosya_adi, yoksa varsayılan
                                    $imagePath = (!empty($member->dosya_adi))
                                        ? 'uploads/user/' . htmlspecialchars($member->dosya_adi)
                                        : './lib/assets/img/users.jpg';
                                    ?>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="avatar me-3">
                                            <img src="<?php echo $imagePath; ?>" alt="User Image" class="avatar shadow object-fit-cover"
                                                width="100" height="100">
                                        </div>
                                        <div class="d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($member->username); ?></h6>
                                            <p class="mb-0 text-xs"><?php echo htmlspecialchars($member->email); ?></p>
                                        </div>
                                        <div class="ms-auto d-flex gap-1">

                                        </div>
                                    </li>
                                    <?php
                                }
                            } else {
                                echo '<li class="list-group-item">No users found.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
        } else {
            // Rol 1 veya 2 değilse yetki mesajı
            echo '<p>You do not have permission to view this content.</p>';
        }
        ?>

        <?php
        // Aktif sohbet sayısı (son 48 saat içinde)
        $db->sql = "
    SELECT COUNT(*) AS total 
    FROM community_comments 
    WHERE user_id = ? 
    AND DATE(created_at) IN (CURDATE(), CURDATE() - INTERVAL 1 DAY)";
        $db->veri = [$id];
        $activeCount = $db->select(1)->total;

        // Pasif sohbet sayısı
        $db->sql = "
    SELECT COUNT(*) AS total 
    FROM community_comments 
    WHERE user_id = ? 
    AND DATE(created_at) < CURDATE() - INTERVAL 1 DAY";
        $db->veri = [$id];
        $inactiveCount = $db->select(1)->total;

        // Toplam konu sayısı (GEREKLİ!)
        $db->sql = "SELECT COUNT(*) as total FROM community_topics";
        $totalTopics = $db->select(1)->total;

        // Hiç katılmadığı konu sayısı
        $db->sql = "
    SELECT COUNT(*) as total 
    FROM community_topics 
    WHERE id NOT IN (
        SELECT DISTINCT topic_id 
        FROM community_comments 
        WHERE user_id = ?
    )";
        $db->veri = [$id];
        $unparticipatedCount = $db->select(1)->total;

        //En çok sohbet ettiği konu
        $db->sql = "
    SELECT topic_id, COUNT(*) as comment_count 
    FROM community_comments 
    WHERE user_id = ? 
    GROUP BY topic_id 
    ORDER BY comment_count DESC 
    LIMIT 1";
        $db->veri = [$id];
        $topTopic = $db->select(1);

        // Yüzde hesapları
        $activeRate = 0;
        if (($activeCount + $inactiveCount) > 0) {
            $activeRate = round(($activeCount / ($activeCount + $inactiveCount)) * 100);
        }

        $inactiveRate = 0;
        if (($activeCount + $inactiveCount) > 0) {
            $inactiveRate = round(($inactiveCount / ($activeCount + $inactiveCount)) * 100);
        }

        $neutralRate = 0;
        if ($totalTopics > 0) {
            $neutralRate = round(($unparticipatedCount / $totalTopics) * 100);
        }

        $topTopicId = $topTopic->topic_id ?? null;
        $topTopicCount = $topTopic->comment_count ?? 0;

        if ($topTopicId) {
            $db->sql = "SELECT title FROM community_topics WHERE id = ?";
            $db->veri = [$topTopicId];
            $topTopicTitle = $db->select(1)->title;
        } else {
            $topTopicTitle = "No participation yet";
        }

        ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        <!-- AKTİF SOHBET -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card"
                                style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                                <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-circle-08 text-dark text-gradient text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <?php echo $activeCount; ?>
                                            </h5>
                                            <span class="text-white text-sm">Participate in Active Chat</span>
                                        </div>
                                        <div class="col-4">
                                            <!-- <div class="dropdown text-end mb-6">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownUsers1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers1">
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">View
                                                            Details</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Something else here</a></li>
                                                </ul>
                                            </div> -->
                                            <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">
                                                +<?php echo $activeRate; ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PASİF SOHBET -->
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                            <div class="card"
                                style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                                <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-active-40 text-dark text-gradient text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <?php echo $inactiveCount; ?>
                                            </h5>
                                            <span class="text-white text-sm">Passive Chat Participation</span>
                                        </div>
                                        <div class="col-4">
                                            <!-- <div class="dropstart text-end mb-6">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownUsers2"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers2">
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Something else here</a></li>
                                                </ul>
                                            </div> -->
                                            <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">
                                                +<?php echo $inactiveRate; ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <!-- NORT SOHBET -->
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card"
                                style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                                <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-cart text-dark text-gradient text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <?php echo $unparticipatedCount; ?>
                                            </h5>
                                            <span class="text-white text-sm">Neutral Chat Participation</span>
                                        </div>
                                        <div class="col-4">
                                            <!-- <div class="dropdown text-end mb-6">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownUsers3"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers3">
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Something else here</a></li>
                                                </ul>
                                            </div> -->
                                            <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">
                                                +15%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                            <div class="card"
                                style="background-image: url('../../../assets/img/curved-images/white-curved.jpeg')">
                                <span class="mask bg-gradient-dark opacity-9 border-radius-xl"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                                <i class="ni ni-like-2 text-dark text-gradient text-lg opacity-10"
                                                    aria-hidden="true"></i>
                                            </div>
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <?php echo $topTopicCount; ?>
                                            </h5>
                                            <span class="text-white text-sm">Most Engaged Topic</span>
                                        </div>
                                        <div class="col-4">
                                            <!-- <div class="dropstart text-end mb-6">
                                                <a href="javascript:;" class="cursor-pointer" id="dropdownUsers4"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h text-white" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers4">
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item border-radius-md"
                                                            href="javascript:;">Something else here</a></li>
                                                </ul>
                                            </div> -->
                                            <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">
                                                +<?php echo $neutralRate; ?>%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                    <?php
                    // En çok katılım yapılan ilk 3 konu
                    $db->sql = "
        SELECT topic_id, COUNT(*) as comment_count 
        FROM community_comments 
        WHERE user_id = ? 
        GROUP BY topic_id 
        ORDER BY comment_count DESC 
        LIMIT 3";
                    $db->veri = [$id];
                    $topTopics = $db->select();

                    // Toplam yorum sayısı
                    $db->sql = "SELECT COUNT(*) as total FROM community_comments WHERE user_id = ?";
                    $db->veri = [$id];
                    $totalComments = $db->select(1)->total;

                    $topTopicData = [];
                    foreach ($topTopics as $topic) {
                        $topicId = $topic->topic_id;
                        $commentCount = $topic->comment_count;

                        $db->sql = "SELECT title FROM community_topics WHERE id = ?";
                        $db->veri = [$topicId];
                        $title = $db->select(1)->title ?? 'Unnamed Topic';

                        $percentage = $totalComments > 0 ? round(($commentCount / $totalComments) * 100) : 0;

                        $topTopicData[] = [
                            'title' => $title,
                            'count' => $commentCount,
                            'percentage' => $percentage
                        ];
                    }
                    ?>
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Subjects You Are Most Interested In</h6>
                        </div>
                        <div class="card-body pb-0 p-3">
                            <ul class="list-group">
                                <?php foreach ($topTopicData as $topic): ?>
                                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                        <div class="w-100">
                                            <div class="d-flex mb-2">
                                                <span class="me-2 text-sm font-weight-bold text-capitalize">
                                                    <?php echo htmlspecialchars($topic['title']); ?>
                                                </span>
                                                <span class="ms-auto text-sm font-weight-bold">
                                                    <?php echo $topic['percentage']; ?>%
                                                </span>
                                            </div>
                                            <div>
                                                <div class="progress progress-md">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar"
                                                        style="width: <?php echo $topic['percentage']; ?>%;"
                                                        aria-valuenow="<?php echo $topic['percentage']; ?>" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-footer pt-0 p-3 d-flex align-items-center">
                            <div class="w-100 text-end">
                                <!-- <a class="btn bg-gradient-dark mb-0" href="javascript:;">View All Comments</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>


<?php } ?>
<script>
    async function deleteNews(id) {
        const result = await Swal.fire({
            title: 'Warning!',
            text: 'This will be permanently deleted. Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        });

        if (result.isConfirmed) {
            // 1. Haber kaydını sil (negatif id göndererek silme işlemi)
            kaydet(`id=${-1 * id}&tablo_adi=users`);

            // 2. Veritabanı dosya kaydını sil
            $.post('index.php?url=tools/user_crud.php', {
                id: -1 * id,              // Silme işleminde negatif ID kullanılıyor
                tablo_adi: 'users'
            }, function (response) {
                try {
                    const res = JSON.parse(response);
                    if (res.success) {
                        console.log("Kullanıcı başarıyla silindi.");
                    } else {
                        console.error('Silme işlemi başarısız:', res.message);
                    }
                } catch (e) {
                    console.error('Geçersiz JSON yanıtı:', response);
                }

                // 3. Sayfayı güvenli bir şekilde yenile
                location.reload();
            }).fail(function () {
                // 4. Hata durumunda da sayfa yenilensin
                location.reload();
            });
        }
    }
</script>