<?php 

include("../../baglanti/baglanti.php");


if(isset($_POST["girisyap"])){


 	//veritabanında şifreyi md ile şifrelediğimiz için, kullanıcıdan aldığımız şifreyi md5 ile tekrar şifreliyoruz ki veritabanındaki kullanicilar tablosundaki şfre ile aynı olması için. 
	$kullanici_adi=$_POST["kullanici_adi"];
	$kullanici_sifre=md5($_POST["kullanici_sifre"]);

	$kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_email = ? AND kullanici_sifre = ? ");
	$kullanicisor->execute(array($kullanici_adi, $kullanici_sifre));
	$kullanicicek=$kullanicisor->fetch();
 	//Kullanıcı sorgusunu eposta ve şifre de uyuşuyor ise dönen sonuç 0'dan büyük olacak 
 	//çünkü rowCount fonksiyonu sorgudan kaç değer dönerse onu gösterir. 
	if($kullanicisor->rowCount()>0){

//Oturum açan kullanıcının bilgilerini diğer sayfalarda kullanmak için session ile oturum açan kullanıcının eposta adresini alıyoruz.

		$_SESSION["kullanici_email"]=$kullanicicek["kullanici_email"]; 
		header("Location:../index.php");
		exit();

	}else{

		header("Location:../giris.php?durum=basarisiz");
		exit();
	}
}


if(isset($_POST["ayarguncelle"])){

	$ayar_site_baslik=$_POST["ayar_site_baslik"];
	$ayar_telefon=$_POST["ayar_telefon"];
	$ayar_eposta=$_POST["ayar_eposta"];
	$ayar_adres=$_POST["ayar_adres"];

//Ayarlar tablosunu INSERT INTO eklemek istemedik çünkü bize özel bir tablo olacağı için yani sadece tek bir satırı kullanacağımız için  id'si 1 olan satırı güncelledik ve tüm projede id'deki veriye göre verileri listeledik. Admin paneldeki ayarlar sayfasında gördüğün verilerdeki tek değişiklik anında tüm projede uygulanır
	$ayarguncelle=$db->prepare("UPDATE ayarlar SET 
		ayar_site_baslik=?,
		ayar_telefon=?,
		ayar_eposta=?,
		ayar_adres=?
		WHERE ayar_id=1");
	$guncelleme=$ayarguncelle->execute(array($ayar_site_baslik,$ayar_telefon,$ayar_eposta,$ayar_adres));
	//Güncelleme başarılı olursa çalışacak.
	if($guncelleme){
		header("Location:../ayarlar.php?durum=basarili");
		exit();
	}else{
		header("Location:../ayarlar.php?durum=basarisiz");
		exit();
	}
}


if(isset($_POST["hizmetekle"])){
	//Gelen dosyanın uzantısını aldık.
	$ext = strtolower(substr($_FILES['hizmet_resim_yol']["name"], strpos($_FILES['hizmet_resim_yol']["name"], '.') + 1));
	//gelen dosyanın fake konumunu aldık
	@$tmp_name = $_FILES['hizmet_resim_yol']["tmp_name"];
	//dosyanın ismini aldık 
	@$name =$_FILES['hizmet_resim_yol']["name"];  
	//gelen dosyanın hangi klasöre yükleneceğini belirledik
	$uploads_dir = '../../resimler';
	//yeni dosya adı için phpde bir fonksiyon olan uniqid() otomatik bir benzersiz dosya adı oluşturduk.
	$uniq = uniqid();
	//veritabanına kaydedirken substr ile kısaltma yaptık.
	//"../../" burada 6 tane karakter olduğu için veritabanına şu şekilde bir veriyi gönderiyoruz aslında 
	// resimler/dosya_adi.uzanti şeklinde olacak 
	$refimgyol = substr($uploads_dir, 6) . "/" . $uniq . "." . $ext;
	//burada gelen dosyanın bir kopyası belirlediğimiz resimler klasörüne kopyalanıyor.
	@move_uploaded_file($tmp_name, $uploads_dir."/".$uniq.".".$ext);

	//Eğer bir urlden veri alıyorsak bu GET methodu olur
	//Eğer bir POST methodundan alıyorsan gizli bir veri göndermiş olursun. POST GET'E göre çok güvenli.
	$hizmet_adi=$_POST["hizmet_adi"];
	$hizmet_detay=$_POST["hizmet_detay"]; 

	$hizmetekle=$db->prepare("INSERT INTO hizmetler SET 
		hizmet_resim_yol=?,
		hizmet_adi=?,
		hizmet_detay=?");

	$ekleme=$hizmetekle->execute(array($refimgyol, $hizmet_adi, $hizmet_detay)); 

	if($ekleme){

		header("Location:../hizmet-ekle.php?durum=basarili");
		exit();

	}else{

		header("Location:../hizmet-ekle.php?durum=basarisiz");
		exit();

	}
}




if(isset($_POST["hizmetduzenle"])){

	//Burada gelen dosya varmı diye kontrol ettik 
	//eğer dosya seçmediyse kullanıcı demek ki sadece hizmet adı ve detayını güncelledi.
	if($_FILES['hizmet_resim_yol']["size"]>0){

		$ext = strtolower(substr($_FILES['hizmet_resim_yol']["name"], strpos($_FILES['hizmet_resim_yol']["name"], '.') + 1));
		@$tmp_name = $_FILES['hizmet_resim_yol']["tmp_name"];
		@$name =$_FILES['hizmet_resim_yol']["name"];  
		$uploads_dir = '../../resimler';
		$uniq = uniqid();
		$refimgyol = substr($uploads_dir, 6) . "/" . $uniq . "." . $ext;
		@move_uploaded_file($tmp_name, $uploads_dir."/".$uniq.".".$ext);

		$hizmet_adi=$_POST["hizmet_adi"];
		$hizmet_detay=$_POST["hizmet_detay"]; 

		$hizmetduzenle=$db->prepare("UPDATE hizmetler SET 
			hizmet_resim_yol=?,
			hizmet_adi=?,
			hizmet_detay=?
			WHERE hizmet_id= ?
			");

		$duzenle=$hizmetduzenle->execute(array($refimgyol,$hizmet_adi,$hizmet_detay,$_SESSION["hizmet_id"])); 

		if($duzenle){ 
			//Dosya silme komutu 
			unlink("../../".$_SESSION["resim_yol"]);
			//Burada düzenleme sayfasına yönlendirdim. bunun sebebi düzenleme sayfasına doğrudan 
			// yönlendirme yaparsam
			//gördüğün şekilde bir hata alırsın getten gelen bir id değeri olmadığı için
			//ben bunları buraya yazıyorum ama sonra çalıştıktan sonra sil:)
			header("Location:../hizmet-guncelle.php?durum=basarili&id=".$_SESSION["hizmet_id"]);
			exit();

		}else{

			header("Location:../hizmet-guncelle.php?durum=basarisiz&id=".$_SESSION["hizmet_id"]);
			exit();

		}

	}else{

		$hizmet_adi=$_POST["hizmet_adi"];
		$hizmet_detay=$_POST["hizmet_detay"]; 

		$hizmetduzenle=$db->prepare("UPDATE hizmetler SET  
			hizmet_adi=?,
			hizmet_detay=?
			WHERE hizmet_id= ?
			");

		$duzenle=$hizmetduzenle->execute(array($hizmet_adi,$hizmet_detay,$_SESSION["hizmet_id"])); 

		if($duzenle){ 

			header("Location:../hizmet-guncelle.php?durum=basarili&id=".$_SESSION["hizmet_id"]);
			exit();

		}else{

			header("Location:../hizmet-guncelle.php?durum=basarisiz&id=".$_SESSION["hizmet_id"]);
			exit();

		}

	}

}
if(isset($_GET["hizmet_id"])){

	$hizmet_sil=$db->prepare("DELETE FROM hizmetler WHERE hizmet_id = ?");
	$silindi=$hizmet_sil->execute(array($_GET["hizmet_id"]));
	if($silindi){

		header("Location:../hizmetler.php?durum=silindi");
		exit();

	}else{
		header("Location:../hizmetler.php?durum=silinmedi");
		exit();
	}
}


if(isset($_GET["sayfa_id"])){

	$sayfa_sil=$db->prepare("DELETE FROM sayfalar WHERE sayfa_id = ?");
	$silindi=$sayfa_sil->execute(array($_GET["sayfa_id"]));
	if($silindi){

		header("Location:../sayfalar.php?durum=silindi");
		exit();

	}else{
		header("Location:../sayfalar.php?durum=silinmedi");
		exit();
	}
}

if(isset($_POST["sayfaekle"])){

	$sayfa_sira=$_POST["sayfa_sira"];
	$sayfa_baslik=$_POST["sayfa_baslik"]; 
	$sayfa_detay=$_POST["sayfa_detay"]; 

	$sayfa_ekle=$db->prepare("INSERT INTO sayfalar SET 
		sayfa_sira=?,
		sayfa_baslik=?,
		sayfa_detay=? ");
	$ekleme=$sayfa_ekle->execute(array($sayfa_sira,$sayfa_baslik,$sayfa_detay));

	if($ekleme){
		header("Location:../sayfa-ekle.php?durum=basarili");
		exit();
	}else{
		header("Location:../sayfa-ekle.php?durum=basarisiz");
		exit();
	}
}

if(isset($_POST["sayfaguncelle"])){

	$sayfa_sira=$_POST["sayfa_sira"];
	$sayfa_baslik=$_POST["sayfa_baslik"]; 
	$sayfa_detay=$_POST["sayfa_detay"]; 

	$sayfaduzenle=$db->prepare("UPDATE sayfalar SET  
		sayfa_sira=?,
		sayfa_baslik=?,
		sayfa_detay=?
		WHERE sayfa_id= ?
		");

	$duzenle=$sayfaduzenle->execute(array($sayfa_sira,$sayfa_baslik,$sayfa_detay,$_SESSION["sayfa_id"])); 

	if($duzenle){ 

		header("Location:../sayfa-guncelle.php?durum=basarili&id=".$_SESSION["sayfa_id"]);
		exit();

	}else{

		header("Location:../sayfa-guncelle.php?durum=basarisiz&id=".$_SESSION["sayfa_id"]);
		exit();

	}
}

if(isset($_POST["talepolustur"])){

	$nakliyat_turu=$_POST["nakliyat_turu"];
	$ad_ve_soyad=$_POST["ad_ve_soyad"];
	$telefon=$_POST["telefon"];

	$talep_olustur=$db->prepare("INSERT INTO talepler SET
		nakliyat_turu=?,
		ad_soyad=?,
		telefon=?
		");
	$talep=$talep_olustur->execute(array($nakliyat_turu, $ad_ve_soyad, $telefon));

	if($talep){

		header("Location:../../index.php?durum=basarili");
		exit;
		
	}else{
		header("Location:../../index.php?durum=basarisiz");
		exit;
	}
}

if(isset($_GET["talep_id"]) && isset($_GET["durum"])){
		$talep_durumunu_guncelle=$db->prepare("UPDATE talepler SET 
		durum=?
		WHERE talep_id=?");
		$durum_guncellendi= $talep_durumunu_guncelle->execute(array($_GET["durum"],$_GET["talep_id"]));

		if($durum_guncellendi){

		header("Location:../talepler.php?durum=basarili");
		exit;
		
	}else{
		// ../ bu demek mevcut içinde bulunduğu klasörden bir üst klasöre çıkmak demek oluyor.
		//Yani biz şuan "işlemler klasöründeysek ../ kullanarak "admin" klasörüne çıkıyoruz.
		header("Location:../talepler.php?durum=basarisiz");
		exit;
	}
}	




//INSERT INTO => veritabanına kayıt eklemek için kullanılır.
//UPDATE => veri güncellemek için kullanılır.
//DELETE => veri silmek için kullanılırç
//SELECT koşullu veya koşulsuz verileri listelemek için kullanılır.
	//Koşullu ise WHERE komutu ile bir şart belirtmen gerekir her zaman 
	//WHERE komutu SELECT, DELETE VE UPDATE kullanılır. SELECT'TE kullanılmaz.


?>