<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="css/mystyle.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
  </head>

  <body>
    <!--/ Nav bar /-->
    <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll" href="#page-top">DevBlog</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="index.php?action=pageAccueil">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php?action=listAllArticles">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php?action=pageAccueil#contact">Contact</a>
          </li>
          <?php if(isset($_SESSION['username'])) : ?>            
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php?action=deconnexion">Déconnexion</a>
          </li>
          <?php if($_SESSION['droits'] == 1) : ?>
          <li class="nav-item"><a class="nav-link js-scroll" href="index.php?action=editoInterfaceAdmin">Admin</a>
          <?php endif ?>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php?action=displFormulContact">Créer un compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="index.php?action=displConnexion">Connexion</a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
    <!--/ Nav End /-->

    <?= $content ?>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/counterup/jquery.waypoints.min.js"></script>
    <script src="lib/counterup/jquery.counterup.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

  </body>
  </html>