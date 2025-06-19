<?php

//if ( !defined("ADMIN") ) { die("Kullanıcı Girişi Yapın.."); }

$gelen=$_REQUEST;

$f=array_keys($_REQUEST);
if ($f[0]=='url') 			 {array_shift($_REQUEST);} 	$f=array_keys($_REQUEST);
if ($f[count($_REQUEST)-1]=='PHPSESSID') {array_pop($_REQUEST);} 	
if ($f[count($_REQUEST)-1]=='_gid') 	 {array_pop($_REQUEST);}
if ($f[count($_REQUEST)-1]=='_ga') 	 {array_pop($_REQUEST);}




$f=array_keys($_REQUEST);
$boyut= count($_REQUEST);


if ($boyut<2) {die("Eksik Parametre.."); }


$tablo_adi		=	$_REQUEST[$f[$boyut-1]];
$gelen_id		=	$_REQUEST[$f[$boyut-2]];
$idfieldname	=	$f[$boyut-2];




// Silme İşlemi yapılıyor  sıkıntı yoksa id geri gider olumsuzda -1 döner
if ($gelen_id<0)
		{
			$id=$gelen_id*-1;
			$db->sql="delete from ".$tablo_adi." where $idfieldname=?";
			$db->veri=array($id);
			$sil=$db->delete();
			if ($sil) {echo $id;} else { echo -1;}
		}
		

// eğer gelen_id -1 den büyükse insert yada update dir..

if ($gelen_id>-1) 
	
	{
	
			$alanlar="";
			for($i=0;$i<$boyut-2;$i++){ $alanlar.=$f[$i]."='".$_REQUEST[$f[$i]]."',"; }
			$alanlar=substr($alanlar,0,strlen($alanlar)-1);
	
			// ekle insert geriye son id yada hatalı ise -1 

			if($gelen_id==0){


					 $db->sql = "insert into ".$tablo_adi." set ".$alanlar;
					
					$ekle = $db->insert();
					if ($ekle) { echo $db->LastInsertId(); } else {echo -1;}
			}
	
			// update  oldu ise 1 olmadı ise -1
			if($gelen_id>0){
					 
					$db->sql = "update ".$tablo_adi." set ".$alanlar." where $idfieldname='".$gelen_id."'";
					$guncelle = $db->update();
					if ($guncelle) {echo 0;} else { echo -1;}
			}

	}

    echo $db->sql;
/*	
echo $db->sql;
print_r($gelen); */



 