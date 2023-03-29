<!DOCTYPE html>
<head>
<style>
/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

body {
    font-family: "Open Sans", sans-serif;
    color: #444444;
}

a {
    color: #007bff !important;
}

a:hover {
    color: #86db9f;
    text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Raleway", sans-serif;
}


/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/

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

@-webkit-keyframes animate-preloader {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

@keyframes animate-preloader {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}


/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/

@media screen and (max-width: 768px) {
    [data-aos-delay] {
        transition-delay: 0 !important;
    }
}


/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

#header {
    background: #fff;
    transition: all 0.5s;
    z-index: 997;
    padding: 15px 0;
    box-shadow: 0px 0 18px rgba(55, 66, 59, 0.08);
}

#header .logo {
    font-size: 32px;
    margin: 0;
    padding: 0;
    line-height: 1;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}

#header .logo a {
    color: #007bff !important;
}

#header .logo img {
    max-height: 40px;
}

@media (max-width: 992px) {
    #header .logo {
        font-size: 28px;
    }
}


/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/


/* Desktop Navigation */

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
    color: #37423b;
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






/* Mobile Navigation */

.mobile-nav-toggle {
    position: fixed;
    top: 17px;
    right: 15px;
    z-index: 9998;
    border: 0;
    background: none;
    font-size: 24px;
    transition: all 0.4s;
    outline: none !important;
    line-height: 1;
    cursor: pointer;
    text-align: right;
}

.mobile-nav-toggle i {
    color: #37423b;
}

.mobile-nav {
    position: fixed;
    top: 55px;
    right: 15px;
    bottom: 15px;
    left: 15px;
    z-index: 9999;
    overflow-y: auto;
    background: #fff;
    transition: ease-in-out 0.2s;
    opacity: 0;
    visibility: hidden;
    border-radius: 10px;
    padding: 10px 0;
}

.mobile-nav * {
    margin: 0;
    padding: 0;
    list-style: none;
}

.mobile-nav a {
    display: block;
    position: relative;
    color: #37423b;
    padding: 10px 20px;
    font-weight: 500;
    outline: none;
}

.mobile-nav a:hover,
.mobile-nav .active>a,
.mobile-nav li:hover>a {
    color: #007bff !important;
    text-decoration: none;
}

.mobile-nav .drop-down>a:after {
    /* content: "\ea99";
  font-family: IcoFont; */
    padding-left: 10px;
    position: absolute;
    right: 15px;
}

.mobile-nav .active.drop-down>a:after {
    content: "\eaa1";
}

.mobile-nav .drop-down>a {
    padding-right: 35px;
}

.mobile-nav .drop-down ul {
    display: none;
    overflow: hidden;
}

.mobile-nav .drop-down li {
    padding-left: 20px;
}

.mobile-nav-overly {
    width: 100%;
    height: 100%;
    z-index: 9997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(32, 38, 34, 0.6);
    overflow: hidden;
    display: none;
    transition: ease-in-out 0.2s;
}

.mobile-nav-active {
    overflow: hidden;
}

.mobile-nav-active .mobile-nav {
    opacity: 1;
    visibility: visible;
}

.mobile-nav-active .mobile-nav-toggle i {
    color: #fff;
}
</style>
</head>
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a class="navbar-brand" href="index.php"></a>
   
      <img alt="logo" src="../assets/img/LOGO.png" style="width: 350px;height: 50px;">
      

      <nav class="nav-menu d-none d-lg-block"style="margin-left: 500px;">
        <ul>
          <li class="active"><a href="../index.php">Home</a></li>

          <li class="active"><a href="index.php">Request page</a></li>

          <li><a href="search-request.php">Request Status</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
                     </li>
          
          </li>

        </ul>
      </nav>
    </div>
  </header>