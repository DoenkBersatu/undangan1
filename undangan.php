<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lovus - Wedding Website Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lovus is responsive wedding html website template">
    <meta name="keywords" content="wedding,couple,ceremony,reception,rsvp,gallery,event,countdown">
    <meta name="author" content="">


    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->


    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/animate.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery.countdown.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/animsition.min.css" type="text/css">
    <link rel="stylesheet" href="rsvp/form.css">


    <!-- custom background -->
    <link rel="stylesheet" href="css/bg.css" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" href="css/color.css" type="text/css" id="colors">
</head>

<body id="homepage">

        <div id="content" class="no-bottom no-top">
     
            <!-- section begin -->
            <section id="section-hero" class="full-height relative z1 owl-slide-wrapper no-top no-bottom text-light" data-stellar-background-ratio=".2">
                <div class="owl-slider-nav">
                    <div class="next"></div>
                    <div class="prev"></div>
                </div>

                <div class="center-y fadeScroll relative" data-scroll-speed="4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="row">
                                    <div class="spacer-single"></div>
                                    <div class="col-md-5 text-right text-center-sm relative">
                                        <h2 class="name">Kris</h2>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span class="deco-big" data-scroll-speed="2">&amp;</span>
                                    </div>
                                    <div class="col-md-5 text-left text-center-sm relative">
                                        <h2 class="name">Feni</h2>
                                    </div>
                                    <br><br><br>
                                    <?php 
                                    if (isset($_GET["to"])) {
                                        echo "<p>Kepada Bapak/Ibu/Saudara/i</p>"; ?>
                                        <p style="font-size:25px;">
                                            <?php echo $_GET['to']; ?>
                                            </p>
                                            <p style="margin-top: -15px;
    font-size: 10px;">Mohon maaf bila ada kesalahan pada penulisan nama/gelar
                                            <br>
                                            <a href="index.php" class="btn btn-custom mt30">Buka Undangan</a>
                                        </p>
                                    <?php
                                    } else {}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="custom-owl-slider" class="owl-slide" data-scroll-speed="2">
                    <div class="item">
                        <img src="images/slider/foto berdua.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="images/slider/2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="images/slider/3.jpg" alt="">
                    </div>
                </div>
            </section>
            <!-- section close -->

           

   

        <a href="#" id="back-to-top"></a>
        <div id="preloader">
            <div class="preloader1"></div>
        </div>
    </div>
	


    <!-- Javascript Files
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/enquire.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.plugin.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/countdown-custom.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/designesia.js"></script>
  

</body>

</html>