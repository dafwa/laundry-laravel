<?php 
  include 'connect.php';
  session_start();
  //$alertMessage = isset($_GET['alert']) ? htmlspecialchars($_GET['alert']) : '';
  if(isset($_POST['submit'])){  
    $name = mysqli_real_escape_string($mysqli,$_POST["users_name"]);
    $pass = mysqli_real_escape_string($mysqli,$_POST["users_pass"]);
    
    $result = mysqli_query($mysqli,"SELECT * FROM user WHERE username = '$name' AND password='$pass'");    
    
    $row = mysqli_fetch_array($result);
    $cek = mysqli_num_rows($result);
    
    if($cek>0){
      $idnya = $row['id'];
      $level = $row['level'];
      
      if($level == 'admin'){
        $_SESSION['adminweb']=$name;
        header("Location: admin.php");
      }else if($level == 'employee'){
        $_SESSION['employeeweb']=$name;
        header("Location: employee.php");
      }else{
        $_SESSION['userweb']=$name;
        header("Location: index.php");
      }
    }
    else{
      header("Location: index.php?error=Incorrect Username or Password!#login-form");
    }  
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BubbleBrush</title> 
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <!-- <script>
        // Show an alert if the message is not empty
        window.onload = function() {
            const alertMessage = "<?php //echo $alertMessage; ?>";
            if (alertMessage) {
                alert(alertMessage);
            }
        };
  </script> -->
</head>
<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">BubbleBrush</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="#about">Layanan</a></li>
          <li><?php if (isset($_SESSION['userweb']) || isset($_SESSION['employeeweb']) || isset($_SESSION['adminweb'])) {echo "";} else {echo "<a href='#login-form'>Login</a>";} ?></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><?php if (isset($_SESSION['userweb']) || isset($_SESSION['employeeweb']) || isset($_SESSION['adminweb'])) {echo "<a href='logout.php'>Logout</a>";} else {echo "";} ?></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('img/intro-carousel/1.jpeg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Selamat Datang <i>
                <?php 
                  if (isset($_SESSION['userweb'])) {
                    echo $_SESSION['userweb'];
                  } else {
                    echo "";
                  } 
                ?></i>!</h2>
                <p>Kami di BubbleBrush siap membantu Anda mendapatkan pakaian bersih dan segar dengan layanan laundry berkualitas tinggi. Apakah Anda ingin mencuci, mengeringkan, atau menyetrika? Kami memiliki semua solusi yang Anda butuhkan!</p>
                <a href="#about" class="btn-get-started scrollto">Cek Layanan</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Ayo Bersihkan</h2>
                <p>Nikmati kemudahan layanan laundry kami, termasuk cuci kering dan cuci pengharum yang membuat pakaian Anda wangi dan terawat. Cukup hubungi kami dan rasakan perbedaannya!.</p>
                <a href="#delivery" class="btn-get-started scrollto">Lihat Metode Delivery</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Ada Yang Bisa Kami Bantu</h2>
                <p> Tim kami siap menjawab pertanyaan dan membantu Anda menikmati pengalaman laundry yang menyenangkan dan praktis. Pesan sekarang dan biarkan kami mengurus kebersihan pakaian Anda!

                  Kamu bisa menyesuaikan atau mengubah bagian mana pun sesuai kebutuhan dan gaya dari merek BubbleBrush!
                  </p>
                <a href="#contact" class="btn-get-started scrollto">Hubungi Kami</a>
              </div>
            </div>
          </div>

      

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">
    <!--==========================
      Layanan Section
    ============================-->
    <section id="about">
  <div class="container">

    <header class="section-header">
      <h3>Layanan</h3>
      <p>Kami menawarkan berbagai layanan laundry untuk memenuhi kebutuhan kebersihan dan perawatan pakaian Anda. Setiap layanan dirancang untuk memberikan hasil yang optimal dan menjaga kualitas pakaian Anda. Berikut adalah detail layanan kami.</p>
    </header>

    <div class="row about-cols">

      <!-- Layanan Cuci Kering -->
      <div class="col-md-4 wow fadeInUp">
        <div class="about-col">
          <a href="<?php echo isset($_SESSION['userweb']) ? 'buat_pesanan.php?layanan=Cuci Kering&harga=5000' : '#'; ?>">
            <div class="img">
              <img src="img/cuci-kering.jpeg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-tshirt-outline"></i></div>
            </div>
            <h2 class="title">
              Cuci Kering
            </h2>
          </a>
          <p>
            Layanan cuci kering kami adalah pilihan ideal untuk pakaian yang terbuat dari bahan halus dan sensitif, seperti sutra, wol, atau bahan yang mudah rusak. Dengan menggunakan pelarut khusus, kami memastikan pakaian Anda dibersihkan secara efektif tanpa merusak serat. 
          </p>
        </div>
      </div>

      <!-- Layanan Cuci Setrika -->
      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="about-col">
          <a href="<?php echo isset($_SESSION['userweb']) ? 'buat_pesanan.php?layanan=Cuci Setrika&harga=7000' : '#'; ?>">
            <div class="img">
              <img src="img/cuci-setrika.jpeg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-eye-outline"></i></div>
            </div>
            <h2 class="title">
              Cuci Setrika
            </h2>
          </a>
          <p>
            Kami menawarkan layanan cuci setrika yang menyeluruh. Pakaian dicuci bersih dan disetrika rapi, bebas kerutan, sehingga siap digunakan dalam berbagai kesempatan dengan penampilan yang profesional dan menarik.
          </p>
        </div>
      </div>

      <!-- Layanan Cuci Pengharum -->
      <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-col">
          <a href="<?php echo isset($_SESSION['userweb']) ? 'buat_pesanan.php?layanan=Cuci Pengharum&harga=9000' : '#'; ?>">
            <div class="img">
              <img src="img/cuci-pengharum.jpg" alt="" class="img-fluid">
              <div class="icon"><i class="ion-ios-flask"></i></div>
            </div>
            <h2 class="title">
              Cuci Pengharum
            </h2>
          </a>
          <p>
            Cuci pengharum kami memberikan kesegaran ekstra pada pakaian Anda. Selain mencuci dengan cermat, kami menggunakan pengharum yang menyenangkan untuk memberikan aroma tahan lama dan pengalaman menyenangkan saat mengenakan pakaian.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

    <section id="login-form">
      <div class="container mt-5">
        <div class="row justify-content-center">
          
          <!-- Login-form -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <header class="section-header text-center">
                  <h3>Login</h3>
                </header>
                <?php if (isset($_GET['error'])) { ?>            <p class="error"><?php echo $_GET['error']; ?></p>        <?php } ?>
                <form id="loginForm" action="" method="post"> 
                  <div class="form-group">
                    <label for="login-username">Username</label>
                    <input type="text" name="users_name" class="form-control" id="login-username" placeholder="Username" required />
                  </div>
                  <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" name="users_pass" class="form-control" id="login-password" placeholder="Password" required />
                  </div>
                  <div class="text-center">
                    <input class="btn-primary" type="submit" name="submit" value="Login"></input>
                  </div>
                </form>
              </div>
            </div>
          </div>
          
          <!-- Form Registrasi -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <header class="section-header text-center">
                  <h3>Register</h3>
                </header>
                <?php if (isset($_GET['hasil'])) { ?>            <p class="hasil"><?php echo $_GET['hasil']; ?></p>        <?php } ?>
                <form id="registrationForm" action="registrasi.php" method="post">
                  <div class="form-group">
                    <label for="register-username">Username</label>
                    <input type="text" name="username" class="form-control" id="register-username" placeholder="Username" required />
                  </div>
                  <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" name="password" class="form-control" id="register-password" placeholder="Password" required />
                  </div>
                  <div class="form-group">
                    <label for="register-username">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="register-username" placeholder="Alamat" required />
                  </div>
                  <div class="form-group">
                    <label for="register-password">Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" id="register-password" placeholder="Nomor" required />
                  </div>
                  <div class="text-center">
                    <input class="btn-primary" type="submit" name="submit" value="Register"></input>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p> Tim kami siap menjawab pertanyaan dan membantu Anda menikmati pengalaman laundry yang menyenangkan dan praktis. Pesan sekarang dan biarkan kami mengurus kebersihan pakaian Anda!

            Kamu bisa menyesuaikan atau mengubah bagian mana pun sesuai kebutuhan dan gaya dari merek BubbleBrush!
          </p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Jl. A. P. Pettarani, Tidung, Kec. Rappocini,<br>
                Kota Makassar, Sulawesi Selatan 90222</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+62 8902838288</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">BubbleBrush@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 footer-info">
            <h3>BubbleBrush</h3>
            <p>Pesan layanan kami secara online dan nikmati kemudahan penjemputan serta pengantaran. Di BubbleBrush, kebersihan dan kepuasan Anda adalah prioritas kami. Bergabunglah dengan kami dan rasakan perbedaan!

            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#intro">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Layanan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#delivery">Delivery</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#contact">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              RCJP+FC8, <br>
              Jl. A. P. Pettarani, Tidung, Kec. Rappocini,<br>
              Kota Makassar, Sulawesi Selatan 90222 <br>
              <strong>Phone:</strong> +62 8902838288<br>
              <strong>Email:</strong> laundry@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BubbleBrush</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
