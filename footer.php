

<!-- Start of Footer   section
	============================================= -->
	<footer id="ft-footer-2" class="ft-footer-section-2" data-background="assets/img/bg/f-bg.png"  >
		<div class="ft-footer-newslatter position-relative">
			<div class="container">
				<div class="ft-footer-newslatter-content d-flex justify-content-center align-items-center flex-wrap">
					<div class="ft-footer-newslatter-text headline text-center">
						<h2> <?php echo $ayarcek["ayar_site_baslik"]; ?></h2>	
					</div> 
				</div>
			</div>
		</div>
		<div class="ft-footer-widget-wrapper-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="ft-footer-widget ul-li-block headline pera-content">
							<div class="logo-widget">
								<div class="site-logo">
									<a style="color:black; font-weight: bold; font-size: 30px;"> <?php echo $ayarcek["ayar_site_baslik"]; ?></a>	
								</div>
								<div class="ft-footer-address">
									<span>Adres: <?php echo $ayarcek["ayar_adres"] ?></span> 
									<span>E-Posta: <?php echo $ayarcek["ayar_eposta"] ?></span>
									<span>Telefon: <?php echo $ayarcek["ayar_telefon"] ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="ft-footer-widget ul-li-block headline pera-content">
							<div class="menu-widget">
								<h3 class="widget-title">Hizmetlerimiz</h3>
								<ul>
									<?php  
									$hizmetleri_listele=$db->prepare("SELECT * FROM hizmetler");
									$hizmetleri_listele->execute();
									foreach ($hizmetleri_listele as $hizmet) { ?> 
										<li><a href="detay.php?id=<?php echo $hizmet["hizmet_id"]; ?>"><?php echo $hizmet["hizmet_adi"]; ?></a></li> 
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="ft-footer-widget ul-li-block headline pera-content">
							<div class="menu-widget">
								<h3 class="widget-title">Kurumsal Sayfalarımız</h3>
								<ul>
									<?php 
									$sayfaleri_listele=$db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_sira ASC");
									$sayfaleri_listele->execute();
									foreach ($sayfaleri_listele as $sayfa) { ?>
										<li><a href="sayfa?id=<?php echo $sayfa["sayfa_id"]; ?>"><?php echo $sayfa["sayfa_baslik"]; ?></a></li> 
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					 
				</div>
			</div>
		</div>
		<div class="ft-footer-copywrite-2 text-center">
			<span><b><?php echo $ayarcek["ayar_site_baslik"]; ?></b> - Tüm hakları saklıdır.</span>
		</div>
	</footer>		
<!-- End of FAQ why choose  section
	============================================= -->	

	<!-- For Js Library -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/appear.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/jquery.filterizr.js"></script>
	<script src="assets/js/rbtools.min.js"></script>
	<script src="assets/js/jquery.cssslider.min.js"></script>
	<script src="assets/js/rs6.min.js"></script>
	<script src="assets/js/knob.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/gmaps.min.js"></script>
	<script src="../maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6"></script>
</body>
</html>			