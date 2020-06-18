<?php

$numaralar = file_get_contents("numaralar.txt");
$karaListe = file_get_contents("karaliste.txt");
$smsGitti  = file_get_contents("smsgitti.txt");
$listele = 100;

// satır satır alıyorum numaraları 
$numaralarTxt = preg_split('/\r\n|[\r\n]/', $numaralar);
$karalisteTxt = preg_split('/\r\n|[\r\n]/', $karaListe);
$smsgittiTxt = preg_split('/\r\n|[\r\n]/', $smsGitti);

$numaralar = array_unique($numaralarTxt); // aynı numaraları siliyorum
$numaralar = array_diff($numaralar, $karalisteTxt); //karalisteyi diziden çıkarıyorum
$numaralar = array_diff($numaralar, $smsgittiTxt);  //sms atılan numara var ise çıkarıyorum

$toplamNumaraTxt = count($numaralarTxt);
$toplamNumara = count($numaralar);

echo "<h1>Toplamda $toplamNumaraTxt numara var. Tekrar eden numaralar çıkarılınca bu sayı $toplamNumara oluyor.</h1>";
$bolunmus = array_chunk($numaralar, $listele); // kayıtları $listele değişkenine göre listeliyorum

foreach ($bolunmus as $bol => $deger) {
	 echo "<b>LİSTELİ NUMARA BÖLÜM = $bol </br></b>";
	foreach ($deger as $de => $d) {
		echo $d.",</br>";
	}
}

?>
