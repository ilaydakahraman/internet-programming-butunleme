
<?php include 'header.php'; ?>
<!-- Start of banner section
	============================================= -->
	<section id="ft-banner" class="ft-banner-section"  data-background="resimler/anasayfa.jpg">
		<div class="ft-banner-content">
			<div class="container">
				<div class="ft-banner-text-content headline pera-content text-center">

					<h1 style="color: white !important; font-weight: bold;font-size: 50px;"><?php echo $ayarcek["ayar_site_baslik"]; ?></h1>

				</div>
			</div>
		</div>
	</section>
<!-- End of banner section
	============================================= -->	

<!-- Start of Case Study section
	============================================= -->
	<section id="ft-case-study" class="ft-case-study-section" style="margin:15px;">
		<div class="ft-case-study-content d-flex">
			<?php 
			$sira=0;
			$hizmetleri_listele=$db->prepare("SELECT * FROM hizmetler");
			$hizmetleri_listele->execute();
			foreach ($hizmetleri_listele as $hizmet) { 
				$sira++;
				?> 
				<div class="ft-case-study-items position-relative">
					<div class="ft-case-study-img position-relative">
						<img src="<?php echo $hizmet["hizmet_resim_yol"]; ?>">
					</div>
					<div class="ft-case-study-text headline pera-content">
						<span class="serial-no"><?php echo $sira; ?></span>
						<h3><a><?php echo $hizmet["hizmet_adi"]; ?></a></h3>
						<p>
							<?php
							//substr de bu görevi görmekte mb_substr fonksiyonun farkı türkçe harfler gibi diğer dillerin de desteklenmesini sağlamak için sonda bir utf kodlaması koyuyorum.
							//mb_substr fonksiyonu ile devamını oku yapmak için hizmet detayından 0 ile 20 karakter almak istediğimiz için kullandım.
							echo mb_substr($hizmet["hizmet_detay"], 0,20,"UTF-8"); ?>...
						</p>
					</div>
					<a class="more-btn d-flex align-items-center justify-content-center" href="detay.php?id=<?php echo $hizmet["hizmet_id"]; ?>"><i class="fas fa-arrow-right"></i></a>
				</div>
			<?php } ?>
		</div>
	</section>
<!-- End of Case Study section
	============================================= -->	


<!-- Start of why choose us section
	============================================= -->
	<section id="ft-why-choose-2" class="ft-why-choose-section-2 position-relative">
		<span class="why-choose-bg-2"><img src="assets/img/bg/wc-bg2.jpg" alt=""></span>
		<span class="why-choose-img-2 position-absolute wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="assets/img/about/ab3.png" alt=""></span>
		<div class="container">
			<div class="ft-why-choose-content-2">
				<div class="row">
					<div class="col-lg-6">
						<div class="ft-why-choose-text-2">
							<div class="ft-section-title-3 headline">

								<h2>Taşıma Talebi Oluştur</h2>
							</div>
							<div class="ft-why-choose-list-wrapper ul-li-block">
								<ul>
									<li>Formu doldurarak talebini bize ulaştırabilirsin.</li>
									<li>7/24 kesintisiz hizmet.</li>
									<li>Her türlü taşınma işlemi yapılır.</li> 
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ft-why-choose-form-wrapper" >
							<div class="ft-why-choose-form pera-content">
								<form action="admin/islemler/islem.php" method="POST">
									<div class="row">
										<div class="col-md-12">
											<?php 
	              							//Talep oluşturulduysa kullanıcıyı bilgilendirmek için bir mesaj gösteriyorum.
											@$durum=$_GET["durum"];
											if($durum=="basarili"){?>
												<p style="color:green; font-weight: bold;"> Talebiniz alındı.</p>
											<?php  }elseif ($durum=="basarisiz") {?>
												<p style="color:red; font-weight: bold;"> Talebiniz oluşturulamadı.</p>
											<?php } ?> 
											<div class="wc-input">
												<span>Nakliyat Türü:</span>
												<div class="wc-select position-relative">
													<select name="nakliyat_turu"> 
														<option value="Uluslar Arası">Uluslar Arası</option> 
														<option value="Şehir İçi">Şehir İçi</option> 
														<option value="Şehirler Arası">Şehirler Arası</option> </select>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="wc-input">
													<span>Ad ve soyadınız:</span>
													<div class="wc-text-input position-relative">
														<input type="text" name="ad_ve_soyad">
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="wc-input">
													<span>Telefon:</span>
													<div class="wc-text-input position-relative">
														<input type="text" name="telefon">
													</div>
												</div>
											</div>
										</div>
										<button class="btn btn-primary" style="width: 100%" type="submit" name="talepolustur">Talep Oluştur.</button>
									</form>
									<p>Formu doldurduktan sonra ekip arkadaşlarımız size dönüş sağlayacaktır.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<!-- End of why choose us section
	============================================= -->

	<?php include 'footer.php'; ?>