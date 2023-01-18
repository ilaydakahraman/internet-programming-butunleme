<?php 

 include("../baglanti/baglanti.php");

  //Veritabanından ayarlar tablosunu getirmek için id 1 olan ayarı getirdim.

 $ayarsor=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=1");
 $ayarsor->execute();
 $ayarcek=$ayarsor->fetch();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $ayarcek["ayar_site_baslik"]; ?> Yönetim Paneli</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
     
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="islemler/islem.php" method="POST">
              <?php 
              //Giriş durumu eğer başarısız ise kullanıcıyı uyaracağım.
              @$durum=$_GET["durum"];
              if($durum=="basarisiz"){?>
                <p style="color:red; font-weight: bold;">Kullanıcı adı veya şifreniz yanlış.</p>
             <?php  }elseif ($durum=="cikis") {?>
              <p style="color:green; font-weight: bold;">Çıkış işlemi başarıyla yapıldı.</p>
            <?php } ?>
              <h1>Giriş Yap</h1>
              <div>
                <input type="text" class="form-control" placeholder="Kullanıcı adını girin" name="kullanici_adi" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Şifrenizi buraya girin" name="kullanici_sifre" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-primary submit" name="girisyap">Giriş Yap </button>  
              </div> 
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
