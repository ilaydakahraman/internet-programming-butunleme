<?php 
include 'header.php';
?>

<!-- page content -->
<div class="right_col" role="main"> 
	<div class="row">
		<div class="col-md-6 col-sm-12  ">
			<div class="x_panel">
				<?php 
	             //Yeni sayfa eklendiğinde yapılan kontrol
				@$durum=$_GET["durum"];
				if($durum=="basarili"){?>
					<p style="color:green; font-weight: bold;"> Sayfa eklendi.</p>
				<?php  }elseif ($durum=="basarisiz") {?>
					<p style="color:red; font-weight: bold;"> Sayfa eklenemedi.</p>
				<?php } ?> 

				<div class="x_title">
					<h2>Sayfa Ekle</h2>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="islemler/islem.php" method="POST">

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Sıra:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="number" class="form-control" name="sayfa_sira" min="1"> 
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Başlık:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<input type="text" class="form-control" name="sayfa_baslik" > 
							</div>
						</div> 

						<div class="form-group row">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Detay:</label>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<textarea class="form-control" name="sayfa_detay"></textarea>
							</div>
						</div> 
						<div class="ln_solid"></div>

						<div class="form-group row">
							<div class="col-md-9 offset-md-3 text-right">
								<button type="submit" class="btn btn-primary" name="sayfaekle">Kaydet</button> 
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