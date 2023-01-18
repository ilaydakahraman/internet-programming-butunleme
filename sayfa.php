 <?php include 'header.php';

 //Getten gelen id bilgisine göre ilgili sayfanın detayını ekrana yazdırdım
 $sayfa_id=$_GET["id"];
 $sayfa_sorgula=$db->prepare("SELECT * FROM sayfalar WHERE sayfa_id=?");
 $sayfa_sorgula->execute(array($sayfa_id));
 $sayfa=$sayfa_sorgula->fetch();

 ?>
 
<!-- Start of Project details  section
	============================================= -->
	<section id="ft-project-details" class="ft-project-details-section page-padding">
		<div class="container">

			<div class="ft-project-overview-text-wrapper headline pera-content">
				<h3><?php echo $sayfa["sayfa_baslik"]; ?></h3>
				<p> <?php echo $sayfa["sayfa_detay"]; ?></p>

			</div>
		</div>
	</section>
<!-- End of Project details section
	============================================= -->

	<?php include 'footer.php'; ?>