<?php 
include 'header.php';
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
	                <p style="color:green; font-weight: bold;"> Hizmet eklendi.</p>
	             <?php  }elseif ($durum=="basarisiz") {?>
	              <p style="color:red; font-weight: bold;"> Hizmet eklenemedi.</p>
	            <?php } ?> 
	            
				<div class="x_title">
					<h2>Hizmet Ekle</h2>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" enctype="multipart/form-data" action="islemler/islem.php" method="POST" >

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Resim:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="file" class="form-control" name="hizmet_resim_yol" required> 
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Hizmet Başlığı:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="hizmet_adi" required> 
							</div>
						</div>  
						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Hizmet Detayı:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea class="form-control" name="hizmet_detay" required></textarea>
							</div>
						</div> 
						<div class="ln_solid"></div>

						<div class="form-group row">
							<div class="col-md-9 offset-md-3 text-right">
								<button type="submit" class="btn btn-primary" name="hizmetekle">Kaydet</button> 
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