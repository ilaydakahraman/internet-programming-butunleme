<?php 
include 'header.php';
?>

<!-- page content -->
<div class="right_col" role="main"> 
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<?php 
	              //Hizmet silindiğinde tüm hizmetlerin olduğu sayfada kontrol ettim.
	              @$durum=$_GET["durum"];
	              if($durum=="silindi"){?>
	                <p style="color:green; font-weight: bold;"> Hizmet silindi.</p>
	             <?php  }elseif ($durum=="silinmedi") {?>
	              <p style="color:red; font-weight: bold;"> Hizmet silinemedi.</p>
	            <?php } ?> 
				<div>
					<h2>Tüm Hizmetler
						<div style="float:right; ">
							<a href="hizmet-ekle.php" class="btn btn-success btn-sm">Hizmet Ekle</a>
						</div> 
					</h2>  
				</div>
				<div class="x_content">

					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Resim</th>
								<th>Başlık</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sira=0;
							$hizmetleri_listele=$db->prepare("SELECT * FROM hizmetler");
							$hizmetleri_listele->execute();
							foreach ($hizmetleri_listele as $hizmet) { 
								$sira++;
								?> 
								<tr>
									<th scope="row"><?php echo $sira; ?></th>
									<td>
										<img src="../<?php echo $hizmet["hizmet_resim_yol"]; ?>" width="120" height="80">
									</td>
									<td><?php echo $hizmet["hizmet_adi"]; ?></td>
									<td>
										<a class="btn btn-success btn-sm" href="hizmet-guncelle.php?id=<?php echo $hizmet["hizmet_id"]; ?>">
											Düzenle
										</a>
										<a class="btn btn-danger btn-sm" href="islemler/islem.php?hizmet_id=<?php echo $hizmet["hizmet_id"]; ?>">
											Sil
										</a>
									</td>
								</tr>
							<?php } ?> 
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>