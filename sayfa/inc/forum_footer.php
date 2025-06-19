

<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mx-auto text-center">
                <a href="index.php?url=Anasayfa" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Home
                </a>
                <a href="index.php?url=Anasayfa#about" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    About
                </a>
                <a href="index.php?url=Anasayfa#news" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    News
                </a>
                <a href="index.php?url=Anasayfa#library" target="_blank"
                    class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Library
                </a>
                <a href="index.php?url=Anasayfa#team" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Who Are We?
                </a>
                <a href="index.php?url=Anasayfa#result" target="_blank"
                    class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Result
                </a>
                <a href="index.php?url=Anasayfa#contact" target="_blank"
                    class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Contact
                </a>
            </div>
            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                <!-- <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a> -->
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> <img src="lib/temp/img/logo.png" alt="Site Logo" style="height: 20px; width: auto;"
                        class="me-0"> Eco Library
                </p>
            </div>
        </div>
    </div>
</footer>

<script> function dosyaGonder(yer, alt_id, ust_id, islem = 'kaydet', sonuc) {
        // dosya yükleme işlemleri (yer=uploads altındaki klasör adını temsil eder & alt_id=hangi kaydın resmi olduğunu tespit eder)

        var dosyaInput = document.getElementById("dosya");
        var secilenDosya = dosyaInput.files[0];
        var formData = new FormData();

        formData.append("dosya", secilenDosya);

        formData.append("yer", yer);

        formData.append("alt_id", alt_id);

        formData.append("ust_id", 0);

        formData.append("islem", islem);

        $.ajax({
            url: "index.php?url=tools/dosya_yukle", // Gönderilecek hedef sayfa URL'si
            type: "POST",
            data: formData,
            processData: false, // FormData işlemesini devre dışı bırak
            contentType: false, // Content-Type başlığını ayarla
            success: function (response) {
                //-

                switch (sonuc) {





                    case 'news':
                        $('#duzenle').load('index.php?url=ajax/news_edit&id=' + $('#news_id').val());
                        break;



                    case 'user':
                        $('#duzenle').load('index.php?url=ajax/settings_edit&id=' + $('#users_id').val());
                        break;




                }

                //-
            }
        });
    }








    function get_last_id(tablo_adi) { //verilen tablonun son id sini döndürür

        $.ajax({
            type: "POST",
            url: "index.php?url=tools/get_last_id",
            data: "tablo_adi=" + tablo_adi,
            success: function (response) {
                var son_id = parseInt(response);
                $('#last_id').val(son_id);
            },
        });
    }



</script>

<script> function dosyaGonderChat(yer, alt_id, ust_id, islem = 'kaydet', sonuc) {
        // dosya yükleme işlemleri (yer=uploads altındaki klasör adını temsil eder & alt_id=hangi kaydın resmi olduğunu tespit eder)

        var dosyaInput = document.getElementById("dosya");
        var secilenDosya = dosyaInput.files[0];
        var formData = new FormData();

        formData.append("dosya", secilenDosya);

        formData.append("yer", yer);

        formData.append("alt_id", alt_id);

        formData.append("ust_id", ust_id);

        formData.append("islem", islem);

        $.ajax({
            url: "index.php?url=tools/dosya_yukle", // Gönderilecek hedef sayfa URL'si
            type: "POST",
            data: formData,
            processData: false, // FormData işlemesini devre dışı bırak
            contentType: false, // Content-Type başlığını ayarla
            success: function (response) {
                //-

                switch (sonuc) {


                    case 'chats':
                        $('#duzenle').load('index.php?url=ajax/forum_list&id=' + $('#chat_id').val());
                        break;



                }

                //-
            }
        });
    }








    function get_last_id(tablo_adi) { //verilen tablonun son id sini döndürür

        $.ajax({
            type: "POST",
            url: "index.php?url=tools/get_last_id",
            data: "tablo_adi=" + tablo_adi,
            success: function (response) {
                var son_id = parseInt(response);
                $('#last_id').val(son_id);
            },
        });
    }



</script>