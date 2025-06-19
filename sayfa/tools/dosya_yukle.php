<?php

echo $islem = $_REQUEST['islem'];

$alt_id = $_REQUEST['alt_id'];
$ust_id = $_REQUEST['ust_id'];
$yer = $_REQUEST['yer'];

# TANIMLAMALAR ↑



// Yeni dosya adını belirleyin
$new_file_name = uniqid() . '_' . date('Y.m.d_H.i.s') . "." . pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);
$new_upload_field = 'uploads/' . $yer . '/' . $new_file_name;

if ($_FILES["dosya"]["size"] > 5000000) {
    echo "Dosya boyutu sınırı";
} else {

    $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], $new_upload_field);

    if (!$sonuc) {
        echo 0;
    } else {


        if ($islem == 'kaydet') {

            $db->sql = "INSERT INTO dosya SET alt_id=$alt_id ,ust_id=$ust_id, yer='$yer' , dosya_adi='$new_file_name' ";
            $dosya = $db->insert();

            #
        } else if ($islem == 'degistir') {


            $db->sql = "UPDATE dosya SET alt_id=$alt_id ,ust_id=$ust_id, yer='$yer' , dosya_adi='$new_file_name' WHERE alt_id=$alt_id AND yer='$yer'";
            $dosya = $db->update();

            #
        }


        echo $dosya ? 1 : 0;
    }
}
