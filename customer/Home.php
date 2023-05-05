<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lion Security Services PLC</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/FAV.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="shortcut icon" href="assets/img/ronk1.jpg" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style22.css" rel="stylesheet">
<style>
#hero {
    width: 100%;
    height: 505px;
    
    background-size:contain;
    position:relative;
  
    
}

#hero:before {
    content: "";
    background: rgba(0, 0, 0, 0.4);
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}

#hero .container {
    padding-top: 50px;
}

@media (max-width: 992px) {
    #hero .container {
        padding-top: 62px;
    }
}

#hero h1 {
    margin: 0;
    font-size: 48px;
    font-weight: 700;
    line-height: 56px;
    color: #fff;
    font-family: "Poppins", sans-serif;
}

#hero h2 {
    color: #eee;
    margin: 10px 0 0 0;
    font-size: 24px;
}

#hero .btn-get-started {
    font-family: "Raleway", sans-serif;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 35px;
    border-radius: 50px;
    transition: 0.5s;
    margin-top: 30px;
    border: 2px solid #fff;
    color: #fff !important;
}

#hero .btn-get-started:hover {
    background: #007bff !important;
    border: 2px solid #007bff;
}

@media (min-width: 1024px) {
    #hero {
        background-attachment: fixed;
    }
}

@media (max-width: 768px) {
    #hero {
        height: 100vh;
    }
    #hero h1 {
        font-size: 28px;
        line-height: 36px;
    }
    #hero h2 {
        font-size: 18px;
        line-height: 24px;
    }
}
.about .content h3 {
    font-weight: 600;
    font-size: 26px;
}

.about .content ul {
    list-style: none;
    padding: 0;
}

.about .content ul li {
    padding-bottom: 10px;
}

.about .content ul i {
    font-size: 20px;
    padding-right: 4px;
    color: blue;
}

.about .content .learn-more-btn {
    background: #007bff;
    color: #fff;
    border-radius: 50px;
    padding: 8px 25px 9px 25px;
    white-space: nowrap;
    transition: 0.3s;
    font-size: 14px;
    display: inline-block;
}

.about .content .learn-more-btn:hover {
    background: gray;
    color: #fff;
}

@media (max-width: 768px) {
    .about .content .learn-more-btn {
        margin: 0 48px 0 0;
        padding: 6px 18px;
    }
}
#footer .social-links a {
    font-size: 18px;
    display: inline-block;
    background: #007bff !important;
    color: #fff;
    line-height: 1;
    padding: 8px 0;
    margin-right: 4px;
    border-radius: 50%;
    text-align: center;
    width: 36px;
    height: 36px;
    transition: 0.3s;
}

#footer .social-links a:hover {
    background: #095bb1 !important;
    color: #fff;
    text-decoration: none;
}
.back-to-top {
    position: fixed;
    display: none;
    right: 15px;
    bottom: 15px;
    z-index: 99999;
}

.back-to-top i {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    background: #007bff !important;
    color: #fff;
    transition: all 0.4s;
}

.back-to-top i:hover {
    background: #095bb1 !important;
    color: #fff;
}


/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    overflow: hidden;
    background: #fff;
}

#preloader:before {
    content: "";
    position: fixed;
    top: calc(50% - 30px);
    left: calc(50% - 30px);
    border: 6px solid #007bff !important;
    border-top-color: #fff;
    border-bottom-color: #fff;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    -webkit-animation: animate-preloader 1s linear infinite;
    animation: animate-preloader 1s linear infinite;
}

.nav-menu ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-menu>ul {
    display: flex;
}

.nav-menu>ul>li {
    position: relative;
    white-space: nowrap;
    padding: 10px 0 10px 24px;
}

.nav-menu a {
    display: block;
    position: relative;
    color: #37423b !important;
    transition: 0.3s;
    font-size: 15px;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
}

.nav-menu a:hover,
.nav-menu .active>a,
.nav-menu li:hover>a {
    color: #007bff !important;
}

.nav-menu .drop-down ul {
    display: block;
    position: absolute;
    left: 24px;
    top: calc(100% + 30px);
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    padding: 10px 0;
    background: #fff;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    transition: 0.3s;
    border-radius: 4px;
}

.nav-menu .drop-down:hover>ul {
    opacity: 1;
    top: 100%;
    visibility: visible;
}

.nav-menu .drop-down li {
    min-width: 180px;
    position: relative;
}

.nav-menu .drop-down ul a {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 500;
    text-transform: none;
    color: #37423b;
}

.nav-menu .drop-down ul a:hover,
.nav-menu .drop-down ul .active>a,
.nav-menu .drop-down ul li:hover>a {
    color: #007bff !important;
}
.nav-menu .drop-down .drop-down ul {
    top: 0;
    left: calc(100% - 30px);
}

.nav-menu .drop-down .drop-down:hover>ul {
    opacity: 1;
    top: 0;
    left: 100%;
}

.nav-menu .drop-down .drop-down>a {
    padding-right: 35px;
}

.nav-menu .drop-down .drop-down>a:after {
    /* content: "\eaa0";
  font-family: IcoFont; */
    position: absolute;
    right: 15px;
}

@media (min-width: 1024px) {
    #hero {
        background-attachment: fixed;
    }
}

@media (max-width: 768px) {
    #hero {
        height: 100vh;
    }
    #hero h1 {
        font-size: 28px;
        line-height: 36px;
    }
    #hero h2 {
        font-size: 18px;
        line-height: 24px;
    }
}
.courses .course-content h3 a:hover {
    color: #c358cb;
}

.courses .course-content p {
    font-size: 14px;
    color: #777777;
}

.courses .course-content h4 {
    font-size: 14px;
    background: #007bff;
    padding: 7px 14px;
    color: #fff;
    margin: 0;
}


</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="assets/img/LOGO.png" style="width: 800px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 500px;">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="About us.php">About</a></li>         
          <li><a href="contact us.php">Contact</a></li>
          <li class="drop-down"><a href="customer/login/index.php">Login </a> 
          
          </li>

        </ul>
      </nav>
    </div>
  </header><!-- End Header -->
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center" >
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Lion Security Services PLC</h1>
       <h2>Welcome to Lion security services PLC</h2> 
      <a href="About us.php" class="btn-get-started">Read More</a>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>services</h2>
          <p>Our services</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                
                  <h4>Security</h4>
                  
                </div>

                <img src="assets/img/top1.jpg"width="300" height="300">
                 <br><br>
                <span>We Provide the best well trained guarde with Professional controlling system and advance surveillance.</span><br>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                  
                </div>
              </div>
            </div>
          </div>
          <!-- End Course Item -->
                  
           <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
             
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Residential</h4>
                 
                </div>

                <img src="assets/img/top2.jpg"width="360" height="300">
                 <br><br>
                <span> security since its inception has been providing residential security for its customers.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div> 
          <!--End Course Item -->

           <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Escort</h4>
                  
                </div>

                <img src="assets/img/top3.jpg"width="360" height="300">
                 <br><br>
                <span>security Escort is one of or fields of ooperation we provide Escorts with our own latest cars.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div> <!--End Course Item -->
          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>International</h4>
                  
                </div>

                <img src="assets/img/top4.jpg"width="360" height="300">
                 <br><br>
                <span>Lion is providing security service for international organization country wide.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div> <!--End Course Item -->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Hospitals</h4>
                  
                </div>

                <img src="assets/img/1 marestops.jpg"width="360" height="300">
                 <br><br>
                <span>We provide the best well trained guards for hospitals and similar organization.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div>
           <!--End Course Item -->
           <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>UN</h4>
                  
                </div>

                <img src="assets/img/1 un.jpg"width="360" height="300">
                 <br><br>
                <span>Lion security provides protection services for United Nations Organizations.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div>
           <!--End Course Item -->

           <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Hotels</h4>
                  
                </div>

                <img src="assets/img/1 ambassador.jpg"width="360" height="300">
                 <br><br>
                <span>Lion security provides protection services for hotels and guest houses.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div>
           <!--End Course Item -->

           <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Emabasies</h4>
                  
                </div>

                <img src="assets/img/1 Embasies.jpg"width="360" height="300">
                 <br><br>
                <span>Lion Security is providing security services for embasies residing in Addis Ababa, Ethiopia.</span>
                <div class="trainer d-flex justify-content-between align-items-center">
                  
                </div>
              </div>
            </div>
          </div>
           <!--End Course Item -->

           
          
        </div>

      </div>
    </section>

    <!-- ======= About Section ======= -->
   <!-- <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> Missions of Admas University</h2>
          <p> Our Missions</p>
        </div>
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/MISSION.jpg" style="height:400px;" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
              <ui>
              <li>Provide technology supported quality higher education at all levels for affordable price through regular, continuing, and distance education modes so as to produce competent professionals who can support the development endeavour of the country.</li>
              <li>Conduct quality and outcome-based training to produce middle-level human resources and supply to the industry. </li>
              <li>Undertake research that helps to solve the economic and social problems of the country and that can also add new human and material values for the society. </li>
              <li>Produce competent entrepreneurs who could contribute to the technology transfer endeavours of the country. </li>
              <li>Render consultancy and short–term training services to businesses, government, and non–government organizations to help them accomplish their objectives competently. </li>
              <li>Engage in University-Industry linkages and community services to fulfil social responsibilities expected of it as an academic institution. </li>
              </ui>

            </p>
            <a href="#" class="learn-more-btn">Read More</a>
          </div>
        </div>

      </div>
    </section>--><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"style="color: #007bff;">321</span>
            <p>Clients Country Wide</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"style="color: #007bff;">11</span>
            <p>Regional branch in the country</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"style="color: #007bff;">10</span>
            <p>Year of professional service</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"style="color: #007bff;">5019</span>
            <p>Employees Country Wide</p>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->
    <!--End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
     <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our team</h2>
          <p>Meet Our Team</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/employee3.jpg" class="img-fluid" alt="">
              
              <div class="member-content">
                <h4>Asnaku Legesse</h4>
                <span>Human Resource Manager</span>
                <p>
                Asnaku Legesse directs Lion Security service Private Limited company's Human capital. Our human resources is well organized and computerized with an up to date ERP. She has vast experience in the field.
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/employee1.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Abel Werku</h4>
                <span>Managing Director of Lion Security</span>
                <p>
                Abel is the founding member and managing director of lion security service Private Limited Company. He is a visionary, highly motivated person with high punctuality and accuracy in his works.
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/employee2.jpg" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Getachew Arage</h4>
                <span>General Manager</span>
                <p>
                Getachew is talented and well educated to lead a big security firm like Lion. Lion security service PLC has been benefited from Getachew's vast knowledge in the area.  
                </p>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Trainers Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

        <div class="col-lg-9 col-md-6 footer-contact">
            <h3>Lion Security Services</h3>
            <p>
              Ethiopia Addis Ababa,<br>
              Mekanisa,<br><br>
              <strong>Phone:</strong> +251 116 683333 , +251 930 519202<br>
              <strong>Email:</strong> www.lionsecurityservices.com<br>
            </p>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="About us.php" style="color:black !important;">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact us.php" style="color:black !important;">Contact us</a></li>
            </ul>
          </div>
        
    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; <strong><span>Lion Security Services PLC</span></strong> - <?php echo date('Y');?> - Developed By REHA TECH
        </div>
        <div class="credits">
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i  style="color:#fff;" class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i style="color:#fff;" class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i style="color:#fff;" class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i style="color:#fff;" class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i style="color:#fff;" class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top" ><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>