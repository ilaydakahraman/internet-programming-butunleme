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
	                <p style="color:green; font-weight: bold;"> Ayarlar güncellendi.</p>
	             <?php  }elseif ($durum=="basarisiz") {?>
	              <p style="color:red; font-weight: bold;"> Ayarlar güncellenmedi.</p>
	            <?php } ?> 
	            
				<div class="x_title">
					<h2>Ayarlar</h2>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="islemler/islem.php" method="POST">

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Site başlığı:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="ayar_site_baslik" value="<?php echo $ayarcek["ayar_site_baslik"];?>"> 
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">E-Posta:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="ayar_eposta" value="<?php echo $ayarcek["ayar_eposta"];?>"> 
							</div>
						</div> 
						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Telefon:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="ayar_telefon" value="<?php echo $ayarcek["ayar_telefon"];?>"> 
							</div>
						</div> 
						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Adres:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea class="form-control" name="ayar_adres"><?php echo $ayarcek["ayar_adres"];?></textarea>
							</div>
						</div> 
						<div class="ln_solid"></div>

						<div class="form-group row">
							<div class="col-md-9 offset-md-3 text-right">
								<button type="submit" class="btn btn-primary" name="ayarguncelle">Kaydet</button> 
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