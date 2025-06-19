<?php

ob_start();
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'sistem/sabitler.php'; #=============	veritabanı bağlantısını gerçekleştir.  veri tabanı bilgileri içerir
require 'sistem/fonksiyon.php';
require 'sistem/veritabani.php'; #===========	sql işlemlerini yapar.   insert, update, delete gibi...
?>

<?php

// if (!isset($_SESSION['Anasayfa'])) {

//     require_once "sayfa/Anasayfa.php";
//     exit;

// }


if (!isset($_REQUEST['url'])) {   #url değişkenine atanan sayfa adı  kontrol ediliyor
    $file = "sayfa/Anasayfa.php";  #eğer url yoksa  anasayfaya gider.
} else {
    $file = "sayfa/" . $_REQUEST['url'] . ".php"; #  url var ise  "sayfa/liste.php"  gibi direk sayfaya yönlenir.
}



if (file_exists($file)) {
    require_once $file;
} else {

    require_once 'sayfa/404.php';
    exit();
}


 

ob_end_flush();






?> 

