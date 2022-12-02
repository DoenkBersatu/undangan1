<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fenny - Kris</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- custom background -->
    <link rel="stylesheet" href="css/bg.css" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" href="css/color.css" type="text/css" id="colors">
    <style>
    /* codingan prokes */
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 99999;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }

    /* codingan prokes */

    .alert1{
	
	display: none;
}

.alert2{
	
	display: none;
}
  /* codingan alert */
    </style>
</head>

<body id="homepage">

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <div id="wrapper">

        <!-- header begin -->
        <header>


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="index.html">
                                <h2>Fenny<span>&amp;</span>Kris</h2>
                            </a>
                        </div>

                        <span id="menu-btn"></span>
                        <!-- small button close -->

                        <span class="btn-rsvp">RSVP</span>


                    </div>
                </div>
        </header>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- rsvp popup begin -->
            <div id="popup-box" class="full-height">
                <span class="btn-close">
                    <i class="icon_close"></i>
                </span>

                <div class="container center-y">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="deco id-color"><span>We Invite You</span></h2>
                            <h2 data-wow-delay=".2s">Saturday, 27 November 2021</h2>
                        </div>

                        <div class="spacer-double"></div>

                        <div class="col-md-5 col-md-offset-1 text-right">
                            <h3>Wedding Ceremony</h3>
                            13:00 PM - 14:00 PM<br> 100 Mainstreet Center, Sydney<br>
                        </div>

                        <div class="col-md-5">
                            <h3>Wedding Reception</h3>
                            14:00 PM - 16:00 PM<br> 100 Mainstreet Center, Sydney<br>
                        </div>

                        <div class="spacer-double"></div>

                        <form name="rsvp" id='rsvp_form' class="form-underline" method="post" action="rsvp.php">
                            <div class="col-md-3">
                                <input type='text' name='Name' id='name' class="form-control" placeholder="Your Name"
                                    required maxlength="50">
                            </div>
                            <div class="col-md-3">
                                <input type='text' name='Email' id='email' class="form-control" placeholder="Your Email"
                                    required maxlength="50">
                            </div>
                            <div class="col-md-3">
                                <select id="guest" name="Guest" size="1" class="form-control">
                                    <option value="" disabled selected>Guests</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select id="attend" name="Attend" size="1" class="form-control">
                                    <option value="" disabled selected>Are you attending?</option>
                                    <option>yes</option>
                                    <option>no</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="spacer-single"></div>
                                <input type='submit' id='submit' value='Submit' class="btn btn-custom">
                                <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                                <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.
                                </div>
                            </div>
                        </form>
                        <div id="success_message">
                            <h1>Thank You!</h1>
                            <p> We will get back to you soon. </p>
                        </div>
                        <div id="error_message">
                            <h1>Error</h1> Sorry there was an error sending your form.
                        </div>

                        <div class="spacer-single"></div>
                    </div>
                </div>
            </div>
            <!-- rsvp popup close -->

            <!-- section begin -->
            <section id="section-hero" class="full-height relative z1 owl-slide-wrapper no-top no-bottom text-light"
                data-stellar-background-ratio=".2">
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
                                        <h2 class="name">Fenny</h2>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <span class="deco-big" data-scroll-speed="2">&amp;</span>
                                    </div>
                                    <div class="col-md-5 text-left text-center-sm relative">
                                        <h2 class="name">Kris</h2>
                                    </div>
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
                        <img src="images/slider/feni.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="images/slider/kris.jpg" alt="">
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-couple" class="no-top">
                <div class="container relative mt-60 z-index">
                    <div class="row">

                        <div class="col-md-5 col-md-offset-1 text-center">
                            <img src="images/misc/Feni-1.jpg" alt="" class="img-responsive img-rounded wow fadeInLeft"
                                data-wow-delay=".2s" />
                            <div class="padding40">
                                <h3>Ruth Fenny Wijaya</h3>
                                <p>Putri dari
                                    <br>Bapak Tugiran dan Ibu Sugiyanti
                                    <br>Cikalong, Sidareja
                                </p>
                                <!-- social icons -->
                                <div class="social-icons-sm">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                                </div>
                                <!-- social icons close -->
                            </div>
                        </div>

                        <div class="col-md-5 text-center">
                            <img src="images/misc/Kris-1.jpg" alt="" class="img-responsive img-rounded wow fadeInRight"
                                data-wow-delay=".2s" />
                            <div class="padding40">
                                <h3>Krismana Septia Dwi .P</h3>
                                <p>Putra dari
                                    <br>Bapak Keman dan Ibu Reny Prasetyaningsih
                                    <br>Adimulya, Wanareja
                                </p>
                                <!-- social icons -->
                                <div class="social-icons-sm">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-envelope-o"></i></a>
                                </div>
                                <!-- social icons close -->
                            </div>
                        </div>

                        <!-- <div class="col-md-2 col-md-offset-5 text-center absolute">
                            <span class="circle wow zoomIn" data-wow-delay=".8s">
                                <i class="fa fa-heart"></i>
                            </span>
                        </div> -->


                        <div class="clearfix"></div>
                    </div>
                </div>

            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-quote" aria-label="section-quote-1" class="text-light"
                data-stellar-background-ratio=".2">
                <div class="container">
                    <div class="row wow fadeInUp">
                        <div class="col-md-8 col-md-offset-2">
                            <blockquote class="very-big text-light wow fadeIn">
                                "Demikianlah mereka bukan lagi dua, melainkan satu. Karena itu, apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia"
                                <span>Matius 19 : 6 </span>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section aria-label="section" class="no-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="deco id-color"><span>Waktu</span></h2>
                            <h2 data-wow-delay=".2s">Minggu, 18 Desember 2022</h2>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-event">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="images/misc/3.jpg" alt="" class="img-responsive img-rounded wow fadeInLeft">
                        </div>

                        <div class="col-md-5 col-md-offset-1 pt40 pb40 wow fadeIn" data-wow-delay=".5s">
                            <h3>Pemberkatan Nikah</h3>
                            Minggu, 18 Desember 2022<br> Pukul 10.30 WIB<br> GKJ Sidareja<br>Jl. Jend. Sudirman No. 181 Sidareja<br>
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8162160958987!2d108.79088181469322!3d-7.485535594600419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6582772835d675%3A0x3b9dcbc7719d2315!2sGKJ%20Sidareja!5e0!3m2!1sid!2sid!4v1669946114254!5m2!1sid!2sid"
                                class="btn btn-custom mt30 popup-gmaps">Lihat Map</a>
                        </div>
                    </div>

                    <div class="spacer-double"></div>

                    <div class="row">
                        <div class="col-md-5 pt40 pb40 text-right wow fadeIn" data-wow-delay=".5s">
                            <h3>Resepsi Pernikahan</h3>
                            Minggu 18 Desember 2022<br> Pukul 09.00 WIB - Selesai<br> Rumah Mempelai Perempuan<br>Jl. Perintis No. 12 RT 04/05, Cikalong, Sidareja <br>
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.9562245349092!2d108.79745112918907!3d-7.484578499662549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e658271c35218ef%3A0x56da1490974c2de5!2sJl.%20Perintis%2010%2C%20Sidareja%2C%20Kec.%20Sidareja%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah%2053261!5e0!3m2!1sid!2sid!4v1669946446381!5m2!1sid!2sid"
                                class="btn btn-custom mt30 popup-gmaps">Lihat Map</a>
                        </div>

                        <div class="col-md-6 col-md-offset-1">
                            <img src="images/misc/4.jpg" alt="" class="img-responsive img-rounded wow fadeInRight">
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-guestbook" class="text-light" data-stellar-background-ratio=".2">
                <div class="container relative">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Countdown Time</h2>
                            <div class="spacer-single"></div>
                        </div>
                        <!-- <div class="col-md-12 text-center">
                            <h2 class="deco"><span class="id-color">Time Left Until Event</span></h2>
                        </div> -->
                        <div class="col-md-8 col-md-offset-2">
                            <div class="spacer-double"></div>
                            <div id="defaultCountdown" class="wow fadeIn"></div>
                            <div class="spacer-single"></div>
                        </div>


                    </div>


                </div>
        </div>
        </section>
        <!-- section close -->

        <section id="section-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Our Gallery</h2>
                    </div>

                    <div class="col-md-12">
                        <div class="de_tab tab_style_3 text-center">



                            <div class="row">

                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/1.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/1.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>

                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/2.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/2.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>

                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/3.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/3.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/4.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/4.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>

                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/5.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/5.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>

                                <div class="col-md-4 text-center mb10">
                                    <figure class="picframe img-rounded mb20">
                                        <a class="image-popup" href="images/gallery/category-1/6.jpg">
                                            <span class="overlay-v">
                                                <i></i>
                                            </span>
                                        </a>
                                        <img src="images/gallery/category-1/6.jpg" class="img-responsive img-rounded"
                                            alt="">
                                    </figure>
                                </div>
                            </div>




                        </div>

                    </div>
                </div>
            </div>
    </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="deco id-color"><span>&</span></h2>
                    <h2>Wedding Gift</h2>
                    <div class="text-center">
                        Terima kasih Anda telah berkenan mengirimkan hadiah untuk pernikahan kami. Hadiah dapat
                        dikirimkan melalui transfer bank ke rekening di bawah ini:
                       <p></p>
                    </div>
                </div>
                <div class="row">
                    <div class="container mx-auto" style="width:80%;">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-ms-12 col-xs-12"
                                style="border:solid 1px grey;padding: 20px;border-radius:8px;">
                                <div class="card text-center p-3">
                                    <div class="card-header">
                                        Bank BRI
                                    </div>
                                    <div class="card-body text-center">
                                        A/N Ruth Fenny Wijaya 
                                        <h4 id="text1"><b>067901006050509</b></h4>
<br>
<button class="copyButton btn btn-warning" id="copyButton1"><i class="fa fa-copy"></i> Salin No Rekening</button>
<!-- <button onclick='CopyNorek()' class="btn btn-warning">
                                            <i class="fa fa-copy"></i>
                                            Salin No Rekening
                                        </button> -->
                                        <span class="alert1">Berhasil di Copy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5 col-lg-5 col-ms-12 col-xs-12"
                                style="border:solid 1px grey;padding: 20px;border-radius:8px;">
                                <div class="card text-center p-3">
                                    <div class="card-header">
                                        Alamat
                                    </div>
                                    <div class="card-body text-center">
                                    <p id="text2">Jalan Perintis No.12 RT 04 RW 05, Dusun Cikalong, Desa Sidareja, Kecamatan
                                        Sidareja, Cilacap</p> 
                                        <button class="copyButton btn btn-warning" id="copyButton2"><i class="fa fa-copy"></i> Salin Alamat</button>
                                        <span class="alert2">Berhasil di Copy</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    </div>
    <!-- content close -->

    <!-- footer begin -->
    <footer>
        <div class="container text-center text-light">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="hs1 wow fadeInUp">Feni<span>&amp;</span>Kris</h2>
                </div>
            </div>
        </div>

        <div class="subfooter">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        &copy; Uleman Online by Talenta Sarana Abadi
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer close -->

    <a href="#" id="back-to-top"></a>
    <div id="preloader">
        <div class="preloader1"></div>
    </div>
    </div>

    <audio autoplay="autoplay" loop="loop">
        <source src="music/musik.mp3" type="audio/mp3" />
    </audio>

    <img id="myImg" src="images/prokes.jpg" style="width:100%;max-width:300px;display:none;">

    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
    }
    img.onload = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    </script>

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
    <script src="rsvp/form.js"></script>
    <script>
    function copy() {
        document.querySelector("067901006050509").select(),document.execCommand('CopyNorek');
    }
</script>

<script>
		function copy(copyId){
			var $inp=$("<input>");
			$("body").append($inp);
			$inp.val($(""+copyId).text()).select();
			document.execCommand("copy");
			$inp.remove();
			
		}
		$(document).ready(function(){
			$("#copyButton1").click(function(){
				copy('#text1');
                $(".alert1").fadeIn(500,function(){
				$(".alert1").fadeOut();
			});
			});
					});
                    $("#copyButton2").click(function(){
				copy('#text2');
                
            $(".alert2").fadeIn(500,function(){
				$(".alert2").fadeOut();
			});
			});
                    </script>
</body>

</html>