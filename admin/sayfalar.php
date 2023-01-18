<?php 
include 'header.php';
?>

<!-- page content -->
<div class="right_col" role="main"> 
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<?php 
	              //Sayfa silindiğinde tüm Sayfalerin olduğu sayfada kontrol ettim.
	              @$durum=$_GET["durum"];
	              if($durum=="silindi"){?>
	                <p style="color:green; font-weight: bold;"> Sayfa silindi.</p>
	             <?php  }elseif ($durum=="silinmedi") {?>
	              <p style="color:red; font-weight: bold;"> Sayfa silinemedi.</p>
	            <?php } ?> 
				<div>
					<h2>Tüm Sayfaler
						<div style="float:right; ">
							<a href="sayfa-ekle.php" class="btn btn-success btn-sm">Sayfa Ekle</a>
						</div> 
					</h2>  
				</div>
				<div class="x_content">

					<table class="table">
						<thead>
							<tr>
								<th>#</th> 
								<th>Başlık</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sayfalari_listele=$db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_sira ASC");
							$sayfalari_listele->execute();
							foreach ($sayfalari_listele as $sayfa) { ?> 
								<tr>
									<th scope="row"><?php echo $sayfa["sayfa_sira"]; ?></th>
									 
									<td><?php echo $sayfa["sayfa_baslik"]; ?></td>
									<td>
										<a class="btn btn-success btn-sm" href="sayfa-guncelle.php?id=<?php echo $sayfa["sayfa_id"]; ?>">
											Düzenle
										</a>
										<a class="btn btn-danger btn-sm" href="islemler/islem.php?sayfa_id=<?php echo $sayfa["sayfa_id"]; ?>">
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