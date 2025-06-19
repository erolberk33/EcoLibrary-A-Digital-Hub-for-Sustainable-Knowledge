<?php

$id = $_SESSION['login']['id'];

?>

<?php require_once 'inc/forum_ust.php'; ?>
<style>
    /* === Tema Renkleri ve Arka Planlar === */
    .bg-gradient-primary,
    .navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon,
    .card-header,
    .page-link.active,
    .active>.page-link {
        background-image: linear-gradient(310deg, rgb(88, 211, 125) 0%, rgb(22, 134, 59) 100%);
        color: white;
        border-color: transparent;
    }

    .form-control:focus {
        border-color: #008000;
        box-shadow: 0 0 0 2px #008000;
    }

    .card-header h6 {
        color: white;
    }

    /* === DataTables Özelleştirme === */
    div.dataTables_filter {
        text-align: right !important;
        margin-bottom: 1rem;
        margin-right: 10px;
    }

    div.dataTables_filter label {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        font-weight: 500;
        color: #344767;
    }

    div.dataTables_filter input {
        width: 220px !important;
        border-radius: 10px;
        border: 1px solid #ced4da;
        padding: 6px 12px;
        box-shadow: none;
    }

    .dataTables_paginate {
        text-align: right !important;
        margin-top: 1rem;
    }

    .dataTables_paginate .pagination {
        justify-content: flex-end !important;
        margin-bottom: 0;
    }

    .dataTables_paginate .page-item .page-link {
        border-radius: 8px;
        color: #4caf50;
        font-weight: 600;
        border: 1px solid #dcdcdc;
        padding: 6px 12px;
        margin: 0 3px;
        transition: 0.2s;
    }

    .dataTables_paginate .page-item.active .page-link {
        background-color: #4caf50;
        color: white;
        border-color: #4caf50;
    }

    .dataTables_paginate .page-item .page-link:hover {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .dataTables_paginate .page-item.disabled .page-link {
        opacity: 0.5;
        cursor: not-allowed;
        background-color: #f1f1f1;
    }

    div.dataTables_info {
        margin-right: 20px;
        text-align: right !important;
        padding-top: 0.5rem;
        font-size: 0.875rem;
        color: #6c757d;
    }

    table.dataTable thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        color: #344767;
        font-weight: bold;
    }

    table.dataTable tbody td {
        vertical-align: middle;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #dee2e6;
    }

    .dt-button {
        background: linear-gradient(310deg, #66bb6a, #43a047);
        color: #fff !important;
        border: none;
        border-radius: 12px;
        padding: 6px 18px;
        margin-top: 15px;
        font-weight: 600;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dt-button:hover {
        background: linear-gradient(310deg, #81c784, #388e3c);
        color: white !important;
    }

    /* Sayfalama dış kapsayıcı hizalaması */
    div.dataTables_paginate {
        text-align: right !important;
        margin-top: 1rem;
    }

    /* Sayfa düğmeleri (tüm butonlar) */
    .dataTables_paginate .paginate_button {
        display: inline-block;
        background: linear-gradient(310deg, #66bb6a, #43a047);
        color: #fff !important;
        border: none;
        padding: 6px 14px;
        margin: 0 3px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        text-decoration: none;

    }

    /* Hover efekti */
    .dataTables_paginate .paginate_button:hover:not(.disabled):not(.current) {
        background: linear-gradient(310deg, #81c784, #388e3c);
        color: #fff !important;
    }

    /* Aktif sayfa */
    .dataTables_paginate .paginate_button.current {
        background-color: #4caf50;
        color: white !important;
        font-weight: 600;
        box-shadow: 0 0 0 2px #c8e6c9;
    }

    /* Devre dışı bırakılmış (Prev / Next kapalıysa) */
    .dataTables_paginate .paginate_button.disabled {
        background-color: #f1f1f1 !important;
        color: #999 !important;
        cursor: not-allowed !important;
        pointer-events: none;
        box-shadow: none;
    }

    /* Simge hizalama ve boyut */
    .dataTables_paginate .paginate_button i {
        font-size: 14px;
        margin-right: 0;
        vertical-align: middle;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php require_once 'inc/forum_slide.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->


        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">

                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <!-- <div class="input-group">
          <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="Type here...">
        </div> -->
                    </div>
                    <ul class="navbar-nav  justify-content-end">


                        <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="lib/assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="lib/assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0 ">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>


                        </li> -->

                        <li class="nav-item dropdown px-2 pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-gear me-sm-1"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="index.php?url=Settings">
                                        <div class=" d-flex py-1">
                                            <div class="my-auto">
                                                <i class="fa-solid fa-gears"></i>
                                            </div>
                                            <div class="ms-3 d-flex flex-column justify-content-end">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">PROFİL AYARLARI</span>
                                                </h6>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- AYARLAR MODAL  -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close text-dark"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="duzenle">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <i class="fa fa-money-check me-sm-1"></i>
                                            </div>
                                            <div class="ms-3 d-flex flex-column justify-content-end">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">ÖDEME AYARLARI</span>
                                                </h6>

                                            </div>
                                        </div>
                                    </a>
                                </li> -->
                                <li class="mb-2 ">
                                    <a class="dropdown-item border-radius-md" href="index.php?url=logout">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <i class="fa fa-user me-sm-1"></i>
                                            </div>
                                            <div class="ms-3 d-flex flex-column justify-content-end">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">ÇIKIŞ YAP</span>
                                                </h6>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>


                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->


        <div class="container-fluid py-4">
            <div class="row">

                <?php
                // Role 1 ve 2 toplamını al
                $db->sql = "SELECT COUNT(*) as count FROM users WHERE role IN (1, 2)";
                $active = $db->select();
                $active_count = $active ? $active[0]->count : 0;

                // Tüm kullanıcıları al
                $db->sql = "SELECT COUNT(*) as count FROM users";
                $all = $db->select();
                $all_count = $all ? $all[0]->count : 0;

                // Oran hesapla
                $percent_active = $all_count > 0 ? round(($active_count / $all_count) * 100, 2) : 0;
                ?>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Members </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?= $active_count ?>
                                            <span
                                                class="text-success text-sm font-weight-bolder"><?= $percent_active ?>%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                        <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                // Onay bekleyen üyeler (role = 0)
                $db->sql = "SELECT COUNT(*) as count FROM users WHERE role = 0";
                $pending = $db->select();
                $pending_count = $pending ? $pending[0]->count : 0;

                // Tüm kullanıcı sayısı
                $db->sql = "SELECT COUNT(*) as count FROM users";
                $all = $db->select();
                $all_count = $all ? $all[0]->count : 0;

                // Oran hesapla
                $percent_pending = $all_count > 0 ? round(($pending_count / $all_count) * 100, 2) : 0;
                ?>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Members Awaiting
                                            Approval
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?= $pending_count ?>
                                            <span
                                                class="text-warning text-sm font-weight-bolder"><?= $percent_pending ?>%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                                        <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                date_default_timezone_set('Europe/Istanbul'); // Zaman dilimi ayarı
                
                // 1. Konu bazında en son mesajların zamanını alıyoruz
                $db->sql = "
    SELECT id, MAX(created_at) AS last_message_time
    FROM community_contents
    GROUP BY id
";
                $topics = $db->select();

                // Değişkenleri tanımla
                $active_topics = 0;
                $total_topics = is_array($topics) ? count($topics) : 0;
                $now = new DateTime();

                if ($topics && is_array($topics)) {
                    foreach ($topics as $topic) {
                        $last_time = new DateTime($topic->last_message_time);

                        // İki zaman damgası arasındaki saniye farkı
                        $intervalInSeconds = $now->getTimestamp() - $last_time->getTimestamp();

                        // Saniyeyi saate çevir
                        $hours_diff = $intervalInSeconds / 3600;

                        // 48 saatten az veya eşitse aktif say
                        if ($hours_diff <= 48) {
                            $active_topics++;
                        }
                    }
                }

                // Pasif sohbet sayısı ve yüzdesi
                $passive_topics = $total_topics - $active_topics;

                // Aktif ve pasif yüzdeleri hesapla
                $active_percent = $total_topics > 0 ? round(($active_topics / $total_topics) * 100, 2) : 0;
                $passive_percent = $total_topics > 0 ? round(($passive_topics / $total_topics) * 100, 2) : 0;
                ?>

                <!-- Aktif sohbetler kartı -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Chats</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?= $active_topics ?>
                                            <span
                                                class="text-success text-sm font-weight-bolder"><?= $active_percent ?>%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="ni ni-chat-round text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pasif sohbetler kartı -->
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Old Conversations</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?= $passive_topics ?>
                                            <span
                                                class="text-danger text-sm font-weight-bolder">-<?= $passive_percent ?>%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                                        <i class="ni ni-single-copy-04 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- START -->

            <div class="col-12">

                <div class="card mt-4">
                    <div class="card-header pb-0">
                        <h6>What's Happening in the Forum?</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="tablo">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Subject</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Rol</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Situation</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Last Message</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db->sql = "
    SELECT community_topics.*, community_contents.*, users.username, users.email, users.role
    FROM community_topics
    INNER JOIN community_contents ON community_topics.id = community_contents.topic_id
    INNER JOIN users ON community_contents.user_id = users.id
    ORDER BY community_contents.created_at DESC
";

                                    $community = $db->select();

                                    if ($community) {
                                        $now = new DateTime();
                                        foreach ($community as $value) {
                                            $created = new DateTime($value->created_at);
                                            $diffHours = ($now->getTimestamp() - $created->getTimestamp()) / 3600; // saat farkı 
                                    
                                            if ($diffHours <= 48) {
                                                $statusBadge = '<span class="badge badge-sm bg-gradient-success">Active</span>';
                                            } else {
                                                $statusBadge = '<span class="badge badge-sm bg-gradient-danger">Passive</span>';
                                            }

                                            // Role için isimlendirme
                                            if ($value->role == 1) {
                                                $roleName = 'Member';
                                            } elseif ($value->role == 2) {
                                                $roleName = 'Admin';
                                            } else {
                                                $roleName = 'Unknown';
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="https://img.icons8.com/?size=100&id=QxNDCQCA0COh&format=png&color=000000"
                                                                class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <?= htmlspecialchars($value->content_primary) ?>
                                                            </h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                <?= htmlspecialchars($value->title) ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0"><?= $roleName ?></p>
                                                    <!-- <p class="text-xs text-secondary mb-0">Participant</p> -->
                                                </td>
                                                <td class="align-middle text-center text-sm"><?= $statusBadge ?></td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold"><?= date("d/m/Y", strtotime($value->created_at)) ?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="#" class="text-secondary font-weight-bold text-xs open-forum-modal"
                                                        data-id="<?= $value->id ?>" data-bs-toggle="modal"
                                                        data-bs-target="#forumModal" title="Profili Gör">
                                                        View
                                                    </a>
                                                    <?php if ($_SESSION['login']['role'] == 2): ?>
                                                        <a href="javascript:void(0);"
                                                            class="text-danger font-weight-bold text-xs delete-btn" title="Delete"
                                                            onclick="deleteChats(<?php echo $value->id; ?>)">Del</a>
                                                    <?php endif; ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="forumModal" tabindex="-1" role="dialog" aria-labelledby="forumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="forumModalLabel"> <a href="#"
                                    class="logo d-flex align-items-center me-auto">
                                    <img src="lib/temp/img/logo.png" alt="Site Logo" style="height: 60px; width: auto;"
                                        class="me-2">
                                    <h1 class="sitename fs-4 fw-bold font-weight-light mb-0">Eco Library Community</h1>
                                </a></h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="forumModalContent">
                            <!-- AJAX içerik buraya gelecek -->
                        </div>
                    </div>
                </div>
            </div>





            <?php require_once 'inc/forum_footer.php'; ?>
        </div>
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 1. jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- 2. SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- DataTables Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#tablo').DataTable({
                pagingType: "simple_numbers",
                lengthChange: false,
                responsive: true,
                dom: 'Bfrtip', // Butonlar için gerekli
                language: {
                    search: "🔍 Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    paginate: {
                        previous: "<i class='fa fa-chevron-left'></i>",
                        next: "<i class='fa fa-chevron-right'></i>"
                    },
                    zeroRecords: "No matching records found",
                    loadingRecords: "Loading...",
                    processing: "Processing..."
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 Rows', '25 Rows', '50 Rows', 'All']
                ],
                initComplete: function (settings, json) {
                    $('#loading').hide();
                },
                buttons: [
                    // {
                    //     text: 'Add Chat',
                    //     action: function () {
                    //         $('#forumModalContent').load('index.php?url=ajax/forum_edit&id=0');
                    //         $('#forumModalLabel').text('Add Chat Form');
                    //         $('#forumModal').modal('show');
                    //     }
                    // },
                    {
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export to PDF',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Forum modal bağlantılarına tıklama dinleyicisi
            document.querySelectorAll('.open-forum-modal').forEach(link => {
                link.addEventListener('click', function () {
                    const forumId = this.getAttribute('data-id');
                    openForumModal(forumId);
                });
            });

            // content_id URL'den alınır ve varsa otomatik modal açılır
            const params = new URLSearchParams(window.location.search);
            const contentId = params.get('content_id');

            if (contentId) {
                openForumModal(contentId);
                // Bootstrap modal açılır
                const myModal = new bootstrap.Modal(document.getElementById('forumModal'));
                myModal.show();
            }
        });

        function openForumModal(forumId) {
            if (!forumId) {
                console.error('⚠️ openForumModal fonksiyonuna geçersiz forumId geldi:', forumId);
                document.getElementById('forumModalContent').innerHTML = "<p>Forum ID bulunamadı.</p>";
                return;
            }

            fetch(`index.php?url=ajax/forum_list&id=${forumId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Sunucu hatası: ' + response.status);
                    return response.text();
                })
                .then(html => {
                    document.getElementById('forumModalContent').innerHTML = html;
                })
                .catch(error => {
                    document.getElementById('forumModalContent').innerHTML = "<p>İçerik yüklenemedi.</p>";
                    console.error('Modal içerik hatası:', error);
                });
        }

    </script>


    <script>
        // Modal tamamen kapandıktan sonra çalışacak
        document.addEventListener('DOMContentLoaded', function () {
            const modalEl = document.getElementById('forumModal');

            modalEl.addEventListener('hidden.bs.modal', function () {
                window.location.href = 'index.php?url=Forum';
            });
        });
    </script>
    <script>
        function kaydet(x, guncelle = 0) {
            $.ajax({
                type: "POST",
                url: "index.php?url=table_har",
                data: x,
                success: function (response) {
                    if (response != -1) {
                        coast_alert("Başarılı...", 1500, "success");

                        response = parseInt(response);

                        if (guncelle) {
                            // URL'den content_id'yi al
                            const params = new URLSearchParams(window.location.search);
                            const contentId = params.get('content_id');

                            if (contentId) {
                                $('#example').load('index.php?url=ajax/forum_list&content_id=' + contentId);
                            } else {
                                $('#example').load('index.php?url=ajax/forum_list');
                            }
                        } else {
                            $('#exampleModal').modal('hide');
                        }

                    } else {
                        coast_alert("Kayıt Başarısız...", 1500, "error");
                    }

                    $('#loading').hide();
                }
            });
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--   Core JS Files   -->
    <script src="lib/assets/js/core/popper.min.js"></script>
    <script src="lib/assets/js/core/bootstrap.min.js"></script>
    <script src="lib/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="lib/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="lib/assets/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>



    <script>
        async function deleteChats(id) {
            const result = await Swal.fire({
                title: 'Warning!',
                text: 'This will be permanently deleted. Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            });

            if (result.isConfirmed) {
                // Önce community_contents kaydını sil
                $.post('index.php?url=table_har', {
                    id: -1 * id,
                    tablo_adi: 'community_comments'
                }, function (res1) {

                    // Ardından bağlı yorum ve dosyaları sil
                    $.post('index.php?url=tools/delete_chats', { id: id }, function (res2) {
                        try {
                            const data = JSON.parse(res2);
                            if (data.success) {
                                // Başarı mesajı göster ve ardından sayfayı yenile
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'All related records were deleted.',
                                    icon: 'success',
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload(); // Tamamlandıktan sonra sayfayı yenile
                                });
                            } else {
                                Swal.fire('Error!', data.message, 'error');

                            }
                        } catch (e) {
                            Swal.fire('Error!', 'Unexpected response.', 'error');
                            console.error(res2);

                        }

                    });
                    location.reload(); // Tamamlandıktan sonra sayfayı yenile
                });
            }
        }
    </script>

    <script>
        let lastChatsId = 0;
        let intervalHandle = null;
        let currentContentId = null;

        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const contentId = params.get('content_id');
            if (contentId) {
                const targetModal = document.querySelector(`.open-forum-modal[data-id="${contentId}"]`);
                if (targetModal) {
                    console.log("🔁 Sayfa yenilendi ve content_id bulundu, modal otomatik açılıyor:", contentId);
                    targetModal.click();
                }
            }

            const modalEl = document.getElementById('forumModal');
            if (modalEl) {
                modalEl.addEventListener('hidden.bs.modal', function () {
                    window.location.href = 'index.php?url=Forum';
                });
            }
        });

        document.querySelectorAll('.open-forum-modal').forEach(btn => {
            btn.addEventListener('click', function () {
                currentContentId = this.getAttribute('data-id');
                if (!currentContentId) {
                    console.warn("❌ Geçersiz content_id");
                    return;
                }

                if (intervalHandle) clearInterval(intervalHandle);

                $.get('index.php?url=tools/get_last_chat_id', { content_id: currentContentId }, function (data) {
                    const parsed = parseInt(data);
                    lastChatsId = !isNaN(parsed) ? parsed : 0;
                    console.log("🟢 Başlangıç last_id:", lastChatsId);

                    checkNewMessages();
                    intervalHandle = setInterval(checkNewMessages, 10000);
                });
            });
        });

        function checkNewMessages() {
            if (!currentContentId) return;

            console.log(`⏳ checkNewMessages başladı → content_id: ${currentContentId}, last_id: ${lastChatsId}`);

            $.get('index.php?url=tools/get_last_chat_id', { content_id: currentContentId }, function (data) {
                const serverLastId = parseInt(data);

                if (isNaN(serverLastId) || serverLastId <= lastChatsId) {
                    console.log("ℹ️ Yeni mesaj yok.");
                    return;
                }

                console.log(`🆕 Yeni mesaj ID'si bulundu: ${serverLastId}`);

                $.ajax({
                    url: 'index.php?url=tools/chat_messages',
                    method: 'GET',
                    data: {
                        content_id: currentContentId,
                        last_id: serverLastId - 1
                    },
                    cache: false,
                    success: function (htmlData) {
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = htmlData;

                        const newMessage = tempDiv.querySelector(`[data-id="${serverLastId}"]`);
                        const alreadyInDom = document.querySelector(`[data-id="${serverLastId}"]`);

                        if (newMessage && !alreadyInDom) {
                            $('#chatScroll').prepend(newMessage);
                            document.getElementById("chatScroll").scrollTop = 0;
                            lastChatsId = serverLastId;
                            console.log(`✅ Yeni mesaj DOM'un en üstüne eklendi. ID: ${serverLastId}`);
                        } else {
                            console.log(`⚠️ ID ${serverLastId} zaten DOM'da mevcut veya içerik boş geldi.`);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("🚨 AJAX Hatası:", status, error);
                    }
                });
            });
        }

        // Mesaj gönderme
        $(document).on('click', '#sendMessageBtn', function () {
            const $input = $('#messageInput');
            const contentId = $input.data('content-id');
            const message = $input.val();

            if (!contentId) {
                alert("❌ İçerik ID'si bulunamadı.");
                return;
            }

            if (!message.trim()) return;

            $.post('index.php?url=tools/send_message', {
                content_id: contentId,
                message: message
            }, function (response) {
                if (response.success) {
                    $input.val('');
                    console.log("📨 Mesaj gönderildi. ID:", response.lastChatsId);
                    window.location.href = `index.php?url=Forum&content_id=${contentId}`;
                } else {
                    alert("Hata: " + response.message);
                }
            });
        });
    </script>













</body>

</html>