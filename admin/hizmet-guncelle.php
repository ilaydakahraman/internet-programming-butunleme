<?php 
include 'header.php';
$hizmet_id=$_GET["id"];
$hizmet_sorgula=$db->prepare("SELECT * FROM hizmetler WHERE hizmet_id=?");
$hizmet_sorgula->execute(array($hizmet_id));
$hizmet=$hizmet_sorgula->fetch();
 //Eğer kullanıcı yeni resim yüklemek istediğinde eski resmi kaldırmak için bir session 
// yardımı ile düzenleme alanında bu dosyayı konumundan silmek için oluşturdum.
$_SESSION["resim_yol"]=$hizmet["hizmet_resim_yol"];
$_SESSION["hizmet_id"]=$hizmet["hizmet_id"];

?>

<!-- page content -->
<div class="right_col" role="main"> 
	<div class="row">
		<div class="col-md-6 col-sm-12  ">
			<div class="x_panel">
				<?php 
	              //Ayarların güncellemesi ile ilgili bilgilendirmeleri yaptım.
	              @$durum=$_GET["durum"];
	              if($durum=="basarili"){?>
	                <p style="color:green; font-weight: bold;"> Hizmet güncellendi.</p>
	             <?php  }elseif ($durum=="basarisiz") {?>
	              <p style="color:red; font-weight: bold;"> Hizmet güncellendi.</p>
	            <?php } ?> 
	            
				<div class="x_title">
					<h2><?php echo $hizmet["hizmet_adi"]; ?> - Düzenleme</h2>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="islemler/islem.php" method="POST" >

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Mevcut Resim:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<img src="../<?php echo $hizmet["hizmet_resim_yol"]; ?>" width="200">
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Resim:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="file" class="form-control" name="hizmet_resim_yol"> 
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Hizmet Başlığı:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="hizmet_adi" value="<?php echo $hizmet["hizmet_adi"]; ?>" required> 
							</div>
						</div>  
						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Hizmet Detayı:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea class="form-control" name="hizmet_detay" required><?php echo $hizmet["hizmet_detay"]; ?></textarea>
							</div>
						</div> 
						<div class="ln_solid"></div>

						<div class="form-group row">
							<div class="col-md-9 offset-md-3 text-right">
								<button type="submit" class="btn btn-primary" name="hizmetduzenle">Kaydet</button> 
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>