s <?php include 'header.php';
 //Getten gelen id bilgisine göre ilgili hizmetin detayını ekrana yazdırdım
$hizmet_id=$_GET["id"];
$hizmet_sorgula=$db->prepare("SELECT * FROM hizmetler WHERE hizmet_id=?");
$hizmet_sorgula->execute(array($hizmet_id));
$hizmet=$hizmet_sorgula->fetch();

  ?>
 
<!-- Start of Project details  section
	============================================= -->
	<section id="ft-project-details" class="ft-project-details-section page-padding">
		<div class="container">
			<div class="ft-project-overview">

				<div class="row">
					<div class="col-lg-8">
						<div class="ft-project-details-img">
							<img src="<?php echo $hizmet['hizmet_resim_yol']; ?>" alt="">
						</div>
					</div> 
				</div>
			</div>
			<div class="ft-project-overview-text-wrapper headline pera-content">
				<h3><?php echo $hizmet["hizmet_adi"]; ?></h3>
				<p> <?php echo $hizmet["hizmet_detay"]; ?></p>
				 
			</div>
		</div>
	</section>
<!-- End of Project details section
	============================================= -->
 	
<?php include 'footer.php'; ?>