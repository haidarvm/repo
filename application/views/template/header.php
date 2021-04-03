<!doctype html>
<html lang="id">
<?php 
$homeKeyword = 'Repository Fisip, Repository Fisip Unla, Universitas langlangbuana, unla, langlangbuana, fisip, repository';
$homeTitle = "Repository Fisip Unla";
$homeDescription = 'Repository Fisip Universitas langlangbuana unla';
$metaKeyword = !empty($keyword) ? readKeyword($keyword) : $homeKeyword ;
$metaDescriptionClean = empty($metaDescription) ? $homeDescription : $metaDescription;
$metaTitle = empty($title) ? trim($homeTitle) : trim($title);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?=$metaDescriptionClean?>">
	<meta name="title" content="<?php echo $metaTitle;?>">
	<meta name="keywords" content="<?php echo $metaKeyword;?>">
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index,follow" />
  <meta name="google-site-verification" content="-Jv9963EL2y68aP3AQ9UUWyPAKxY45qoP_seVJwalXM" />
  <meta name="author" content="haidarvm">
  <meta http-equiv="content-language" content="In-Id" />
  <meta property="og:site_name" content="<?=site_url();?>" />
  <meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $metaTitle;?>" />
	<meta property="og:description" content="<?=$metaDescriptionClean?>" />
  <meta property="og:url" content="<?=site_url();?>" />
  <meta property="og:image" content="<?=base_url();?>assets/img/unla.jpg" />
  <meta property="og:type" content="website" />
  <link rel="canonical" href="<?=site_url();?>" />
    <!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?=base_url();?>assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/fonts/brand/style.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/aos.css">

  <title>Repository Fisip Unla</title>
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css?ver=2.3">

</head>

<body>
  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar light site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">

          <div class="col-8">
            <div class="site-logo">
            <a href="<?=site_url();?>"><img src="<?=base_url();?>assets/img/repologo.png" /></a> 
              <!-- <a href="<?=site_url();?>home"><strong>Repository UNLA</strong></a> -->
            </div>
          </div>

          <div class="col-4  text-right">

            <span class="d-inline-block d-lg-none"><a href="<?=site_url();?>home/#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

            <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <li><a href="<?=site_url();?>home" class="nav-link ">Home</a></li>
                <li><a href="<?=site_url();?>browse" class="nav-link">Browse</a></li>
                <li><a href="<?=site_url();?>search" class="nav-link">Search</a></li>
                <li><a href="<?=site_url();?>about" class="nav-link">About</a></li>
                <?php  if($this->session->userdata('login')) { ?>
                <li><a href="<?=site_url();?>auth/logout" class="nav-link">Logout</a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>


        </div>
      </div>

    </header>


    <div class="site-section-cover overlay" style="background: url('<?=base_url();?>assets/img/unlagedung.jpg') top right no-repeat;">

      
    </div>