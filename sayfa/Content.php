<?php require_once 'inc/forum_ust.php'; ?>

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

    <?php require_once 'inc/forum_slide.php'; ?>




    <main class="main-content position-relative max-height-vh-80 h-80 border-radius-lg  mt-5">


        <?php require_once 'inc/forum_navbar.php'; ?>



        <div class="container-fluid py-4">
            <!-- ------------------------------------------------ İÇERİK ------------------------------------------------------- -->

            <div class="col-12" id="example">


                <!-- içerik -->

            </div>


        </div>





        <?php require_once 'inc/forum_footer.php'; ?>


    </main>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="duzenle">
                    <!-- NEWS FORM -->
                </div>

            </div>
        </div>
    </div>



    <?php require_once 'inc/alt.php'; ?>

    <script>
        $(document).ready(function () {
            $('#loading').hide();
            $('#example').load('index.php?url=ajax/content_list');
        });





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
                            $('#duzenle').load('index.php?url=ajax/content_edit&id=' + response);
                            $('#example').load('index.php?url=ajax/content_list');
                        }
                        else { $('#exampleModal').modal('hide'); }


                        /*  $('#example').load('index.php?url=ajax/giris_listeleme');            */

                    } else {
                        coast_alert("Kayıt Başarısız...", 1500, "error");
                    }



                    $('#loading').hide();
                }



            });
        }


    </script> 

</body>

</html>