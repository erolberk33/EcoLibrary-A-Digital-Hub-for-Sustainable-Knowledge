<?php require_once 'inc/forum_ust.php'; ?>


</head>

<body class="g-sidenav-show  bg-gray-100">

    <?php require_once 'inc/forum_slide.php'; ?>




    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


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

                </div>

            </div>
        </div>
    </div>



    <?php require_once 'inc/alt.php'; ?>


    <script>
        $(document).ready(function () {
            $('#loading').hide();
            $('#example').load('index.php?url=ajax/settings_list');
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
                            // $('#duzenle').load('index.php?url=ajax/kullanicilar_duzenle&id=' + response);
                            $('#example').load('index.php?url=ajax/settings_list');
                        }
                        else { $('#exampleModal').modal('hide'); }




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