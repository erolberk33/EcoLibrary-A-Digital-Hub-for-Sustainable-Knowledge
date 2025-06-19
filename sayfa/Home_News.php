<?php require_once 'inc/ust.php';


$id = $_GET['id'] ?? '';


// echo $id;

?>
<style>
    .active>.page-link,
    .page-link.active {
        background-image: linear-gradient(310deg, rgb(88, 211, 125) 0%, rgb(22, 134, 59) 100%);
        color: white;
        border-color: transparent;
    }

    .page-link {
        color: green;
    }

    .page-link:hover {
        color: black;
    }

    .page-link:focus {
        color: black;
    }

    /* Arama kutusunu sağa hizala */
    div.dataTables_filter {
        text-align: right !important;
    }

    /* Sayfalama butonlarını sağa hizala */
    .dataTables_info {
        text-align: right !important;
    }



    .pagination {
        justify-content: right !important;

    }
</style>
</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php require_once 'inc/slide.php'; ?>










    <main class="main">


        <?php require_once 'inc/navbar.php'; ?>



        <div class="content-wrapper m-5">

            <section class="content m-5">
                <div class="container-fluid">

                    <!-- ------------------------------------------------ FEATURED SERVICES ------------------------------------------------------- -->
                    <section id="featured-services" class="featured-services section">
                        <div class="container">
                            <div class="row gy-4">
                                <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                                    <!-- içerik buraya -->
                                </div><!-- End Service Item -->
                            </div>
                        </div>
                    </section>
                    <!-- ------------------------------------------------ /FEATURED SERVICES ------------------------------------------------------- -->

                    <div class="row">
                        <div class="col-12" id="example">
                            <!-- içerik -->
                        </div>
                    </div>

                </div>
            </section>

        </div>




        <?php require_once 'inc/footer.php'; ?>


    </main>

 


    <?php require_once 'inc/alt.php'; ?>
    <script>
        <?php
        $id = $_GET['id'] ?? ''; 
        if (!empty($id)) {
            // id varsa sadece o id'ye ait veriyi çek
            echo "$('#example').load('index.php?url=ajax/home_news_list&id=" . urlencode($id) . "');";
        } else {
            // id yoksa tüm verileri çek
            echo "$('#example').load('index.php?url=ajax/home_news_all_list');";
        }
        ?>
    </script>
    <script>
        $(document).ready(function () {
            $('#loading').hide();

        });





        

    </script>


</body>

</html>