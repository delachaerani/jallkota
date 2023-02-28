<?php
    $conn = mysqli_connect("localhost","root","","jallkota");
    if(isset($_POST['kirim'])){
      
        $nama = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO comment VALUES ('','$nama','$email','$comment')";
        $queryadd = mysqli_query($conn, $sql);
    }
    $sqlgetdata = "SELECT * FROM comment order by id desc";
    $queryget = mysqli_query($conn,$sqlgetdata);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>JALLKOTA Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.10.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">JALLKOTA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Explore Bekasi</a></li>
          <li><a href="services.html">City Map</a></li>
          <li><a href="portfolio.html">Tourist attraction</a></li>
          <li><a href="blog.html">Public Services</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Guest Comment</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Guest Comment</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
          <div class="address">
                <h4>Public Comment</h4>
              </div>
            <div class="info overflow-auto" style="height:250px;">
            <?php if(mysqli_num_rows($queryget) == 0 ): ?>
              <div class="alert alert-warning">Belum ada Komentar yang masuk!</div>
            <?php else: ?>            
            <?php while($data = mysqli_fetch_assoc($queryget)): ?>
              <div class="address mt-3">
                <h6><?= $data['name'] ?></h6>
                <p style="padding-left:0px;"><?= $data['comment'] ?></p>
              </div>
              <hr>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <!-- <form action="#" method="POST" role="form" class="php-email-form"> -->
            <form action="guest-comment.php" method="POST" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="comment" rows="5" placeholder="Comment" required></textarea>
              </div>
              <div class="my-3">
                <div class="error-message" style="                
                    <?php if(isset($queryadd) && $queryadd != true){ ?> display:block; <?php }  ?>         
                                                      ">Sorry, your message has not send. Please try again!</div>
                  <div class="sent-message"  style="                
                    <?php if(isset($queryadd) && $queryadd == true){ ?> display:block; <?php }  ?>         
                                                      ">Your message has been sent. Thank you!</div>
              </div>

              <div class="text-center"><button type="submit" name="kirim">Send Comment</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>JALLKOTA</h3>
              <p>
                Bekasi City<br>
                West java<br><br>
                <strong>Phone:</strong> +62 858-9347-8748<br>
                <strong>Email:</strong> opd.distaru@bekasikota.go.id<br>
              </p>
               <div class="social-links mt-3">
                <a href="https://www.facebook.com/106980586300096/posts/1985246335140169/?flite=scwspnss" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/infobekasi?igshid=YmMyMTA2M2Y=" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.html">Explore Bekasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="services.html">City Map</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="portofolio.html">Tourist attraction</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blog.html">Public Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.html">Contact</a></li>
            </ul>
          </div>

           <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Bekasi City Youtube channel</h4>
            <p>Channel: Bekasi City Government</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/MUuP93zsoIw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>        </div>
        </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>JALLKOTA</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">Diana & Dela</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>