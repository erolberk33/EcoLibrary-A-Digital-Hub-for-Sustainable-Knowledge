<?php

$yer = $_REQUEST['sevk'];
$alt_id = $_REQUEST['alt_id'];


if ($_FILES["dosya"]) {

    $yol = '/uploads' . '/' . $yer . '/';

    $dosya_adi = uniqid() . '_' . date('Y-m-d') . '_' . date('H-i-s') . '.' . pathinfo($_FILES["dosya"]["name"])['extension']; //$_FILES["dosya"]["name"]

    $yuklemeYeri = __DIR__ . $yol . $dosya_adi;

    if (file_exists($yuklemeYeri)) {  # Dosya kontrolü

        echo "Dosya daha önceden yüklenmiş";
    } else {

        $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);

        if ($sonuc) {
        } else {
            echo 'Dosya yüklenemedi';
        }
    }
} else {

    echo "Lütfen bir dosya seçin";
}
