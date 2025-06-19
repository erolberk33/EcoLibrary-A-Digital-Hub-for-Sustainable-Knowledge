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



    <!-- DEPO MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-css" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-6">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <div class="col-6 text-end ">
                        <!-- <button type="button" class="close text-dark" data-bs-dismiss="modal" aria-label="Close"> -->

                        <button type="button" onclick="$('#exampleModal').modal('hide');" class="close text-dark"
                            data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" id="duzenle">
                    <!-- DEPO EKLE İÇ KISMI -->
                </div>

            </div>
        </div>
    </div>



    <?php require_once 'inc/alt.php'; ?>
    <script>
        <?php
        $id = $_GET['id'] ?? ''; 
        if (!empty($id)) {
            // id varsa sadece o id'ye ait veriyi çek
            echo "$('#example').load('index.php?url=ajax/library_list&id=" . urlencode($id) . "');";
        } else {
            // id yoksa tüm verileri çek
            echo "$('#example').load('index.php?url=ajax/library_list');";
        }
        ?>
    </script>
    <script>
        $(document).ready(function () {
            $('#loading').hide();

        });





        // function kaydet(x, guncelle = 0) {




        //     $.ajax({
        //         type: "POST",
        //         url: "index.php?url=table_har",
        //         data: x,
        //         success: function (response) {

        //             if (response != -1) {
        //                 coast_alert("Başarılı...", 1500, "success");


        //                 response = parseInt(response);

        //                 if (guncelle) {
        //                     $('#duzenle').load('index.php?url=ajax/library_edit&id=' + response);
        //                     $('#example').load('index.php?url=ajax/library_list');
        //                 }
        //                 else { $('#exampleModal').modal('hide'); }


        //                 /*  $('#example').load('index.php?url=ajax/giris_listeleme');            */

        //             } else {
        //                 coast_alert("Kayıt Başarısız...", 1500, "error");
        //             }



        //             $('#loading').hide();
        //         }



        //     });
        // }


    </script>


</body>

</html>