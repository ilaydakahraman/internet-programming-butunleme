<?php 
include 'header.php';
?>

<!-- page content -->
<div class="right_col" role="main"> 
	<div class="row">
		<div class="col-md-12 col-sm-12  ">
			<div class="x_panel">
				<?php 
	              //talep silindiğinde tüm taleplerin olduğu talepte kontrol ettim.
				@$durum=$_GET["durum"];
				if($durum=="silindi"){?>
					<p style="color:green; font-weight: bold;"> talep silindi.</p>
				<?php  }elseif ($durum=="silinmedi") {?>
					<p style="color:red; font-weight: bold;"> talep silinemedi.</p>
				<?php } ?> 
				<div>
					<h2>Tüm Talepler </h2>  
				</div>
				<div class="x_content">

					<table class="table">
						<thead>
							<tr>
								<th>#</th> 
								<th>Nakliyat Türü</th>
								<th>Talebi Oluşturan</th>
								<th>Telefon</th>
								<th>Tarih</th>
								<th>Durum</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sira=0;
							$talepleri_listele=$db->prepare("SELECT * FROM talepler ORDER BY durum ASC");
							$talepleri_listele->execute();
							foreach ($talepleri_listele as $talep) { 
								$sira++;
								?> 
								<tr>
									<th scope="row"><?php echo $sira; ?></th> 
									<td><?php echo $talep["nakliyat_turu"]; ?></td>
									<td><?php echo $talep["ad_soyad"]; ?></td>
									<td><?php echo $talep["telefon"]; ?></td>
									<td><?php echo $talep["tarih"]; ?></td>
									<td>
										<?php 
										 //Burada talep oluşturan kişi varsayılan olarak 0 tanımladık ki
										 //Kullanıcı talebi buradan onayladığında hangi talebi bitirdiğini bu şekilde takip edebilir. Kontrolü yaptığımız değerlerle aslında talep bitmiş mi bitmemiş mi diye kontrol edeceğim.
										if($talep["durum"]=="0"){?>
										<a class="btn btn-success" href="islemler/islem.php?talep_id=<?php echo $talep["talep_id"]; ?>&durum=1"> Talebi İşleme Koy</a>
										<?php }else{?>
										<a class="btn btn-danger" href="islemler/islem.php?talep_id=<?php echo $talep["talep_id"]; ?>&durum=0"> Talebi Kabul Etme</a>
										<?php } ?>
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