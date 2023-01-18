<?php 
include("baglanti/baglanti.php");

  //Veritabanından ayarlar tablosunu getirmek için id 1 olan ayarı getirdim.

$ayarsor=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=1");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $ayarcek["ayar_site_baslik"]; ?></title> 
	<link rel="shortcut icon" href="assets/img/logo/ficon.png" type="image/x-icon">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/rs6.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<style type="text/css">
	.custom_logo{
		color: white;
		font-size: 16px;
	}
	.ft-banner-section{
		background-image:url("resimler/anasayfa.jpg") no-repeat;
		object-fit: cover;
	}

</style>
<body>
 
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>


	<!-- Start of header section
		============================================= -->
		<header id="ft-header" class="ft-header-section header-style-two">
			<div class="ft-header-top">
				<div class="container">
					<div class="ft-header-top-content d-flex justify-content-between align-items-center">
						<div class="ft-header-top-cta ul-li">
							<ul>
								<li><i class="fas fa-map-marker-alt"></i> <?php echo $ayarcek["ayar_adres"]; ?></li>
								<li><i class="fas fa-email"></i> <?php echo $ayarcek["ayar_eposta"]; ?></li>
								<li><i class="fas fa-phone"></i><?php echo $ayarcek["ayar_telefon"]; ?></li>
							</ul>
						</div>
						<div class="ft-header-cta-info d-flex">

						</div>
					</div>
				</div>
			</div>
			<div class="ft-header-main-menu-wrapper">
				<div class="container">
					<div class="ft-header-main-menu-area position-relative">
						<div class="ft-header-main-menu d-flex align-items-center justify-content-between position-relative">
							<div class="ft-site-logo-area">
								<div class="ft-site-logo position-relative">
									<a href="index.php"><h6 class="custom_logo"><?php echo $ayarcek["ayar_site_baslik"]; ?></h6></a>
								</div>
							</div>
							<div class="ft-main-navigation-area">
								<nav class="ft-main-navigation clearfix ul-li">
									<ul id="ft-main-nav" class="nav navbar-nav clearfix">
										<li >
											<a href="index.php">Anasayfa</a> 
										</li>
										<?php 
										$sayfaleri_listele=$db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_sira ASC");
										$sayfaleri_listele->execute();
										foreach ($sayfaleri_listele as $sayfa) { ?>
											<li><a href="sayfa?id=<?php echo $sayfa["sayfa_id"]; ?>"><?php echo $sayfa["sayfa_baslik"]; ?></a></li> 
										<?php } ?>
									</ul>
								</nav>
							</div>
							<div class="ft-header-cta-btn">
								<a class="d-flex justify-content-center align-items-center" href="#ft-why-choose-2">Talep Oluştur !</a>
							</div>
						</div>
						<div class="mobile_menu position-relative">
							<div class="mobile_menu_button open_mobile_menu">
								<i class="fal fa-bars"></i>
							</div>
							<div class="mobile_menu_wrap">
								<div class="mobile_menu_overlay open_mobile_menu"></div>
								<div class="mobile_menu_content">
									<div class="mobile_menu_close open_mobile_menu">
										<i class="fal fa-times"></i>
									</div>
									<div class="m-brand-logo">
										<h6 class="custom_logo"><?php echo $ayarcek["ayar_site_baslik"]; ?></h6>
									</div>
									<nav class="mobile-main-navigation  clearfix ul-li">
										<ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
											<li >
												<a href="index.php">Anasayfa</a> 
											</li>
											<?php 
											$sayfaleri_listele=$db->prepare("SELECT * FROM sayfalar ORDER BY sayfa_sira ASC");
											$sayfaleri_listele->execute();
											foreach ($sayfaleri_listele as $sayfa) { ?>
												<li><a href="sayfa?id=<?php echo $sayfa["sayfa_id"]; ?>"><?php echo $sayfa["sayfa_baslik"]; ?></a></li> 
											<?php } ?>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Mobile-Menu -->
						</div>
					</div>
				</div>
			</div>
		</header>
<!-- End of header section
	============================================= -->