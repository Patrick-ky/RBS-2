<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LGU | Rental Billing System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ URL('images/logo-lgu.png') }}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
      @keyframes slide-up {
      0% {
        transform: translateY(25%);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }
    
 .slide-up-content {
   animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
 }

    /* Apply the slide-up animation to the Hero Section */
    #hero {
      animation: slide-up 1.5s forwards;
    }
    /* Custom CSS to style the logo, and change text color */
    .logo img {
        max-width: 80px; /* Adjust the size of the logo */
        left: 0px;
    }

    .logo h1 {
        font-size: 28px; /* Adjust the font size for "LOCAL GOVERNMENT UNIT" */
    }

    .logo span {
        font-size: 24px; /* Adjust the font size for "THE RENTAL BILLING SYSTEM" */
        color: white; /* Change text color to white */
    }
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  

  .pulsate {
    animation: pulsate 1.5s infinite;
  }
  #copyright-notice {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 10px;
    color: rgb(192, 247, 167);
  }
</style>


<body style="background-color: #098309">
  @if(session()->has('error'))
  <div class="alert alert-danger">{{session('error')}}</div>
  @endif
  
  @if(session()->has('success'))
  <div class="alert alert-success">{{session('success')}}</div>
  @endif
  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@gensantos.gov.ph</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+63 977-419-5927</span></i>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="https://www.facebook.com/LguGensan" class="facebook"><i class="bi bi-facebook"></i>Visit LGU-Gensan</a>
      </div>

      </div>
      
    </div>
    
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center logo img ">
  <div class="container-fluid container-xl d-flex align-items-center slide-up-content">
    <img src="{{ URL('images\logo-lgu.png') }}" alt="LGU Logo">
        <h2 class="logo h1"style="color: white;"><strong>LOCAL GOVERNMENT UNIT</strong> |<span> General Santos City</span>.</h2>
    </div> 
  </header>
  
  <!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  <section id="hero" class="hero">
    <div class="container position-relative">
        <div id="login-form-container" class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold-mb-2"><h3><strong>LOGIN</strong></h3></div>
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">

                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="e.g: user@gmail.com">
                                </div><br>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                </div>
                                <br>
                                
                                <button type="submit" class="btn btn-success btn-block btn-oblong">Login</button>
                            </form>
                        </div>
                        
                    </div><br>

                </div>
                <div class="col-lg-6">
                    <h2>The Rental Billing System</h2>
                    <p>An application built and developed to notify stall holders via SMS.</p>

                    
                    <p><strong>Register
                        <a
                        href="/registration"
                      
                        class="btn btn-success btn-oblong pulsate" 
                        style="background-color: #098309; color:
                                                 white; border: 2px solid 
                                              #e7ece2;" >HERE</a> For new Admin,</strong>



                </div>
                
            </div>
        </div>
    
    </div>
         



    </div>
  </section>





  </footer><!-- End Footer -->
  <!-- End Footer -->
  <div id="content-container" class="container">
    <!-- Your existing content -->
  
    <div id="copyright-notice">
      &copy; Copyright Impact. All Rights Reserved<br>
      Designed by <a href="https://bootstrapmade.com/" style="color: white;">BootstrapMade</a>
    </div>
  </div>
  

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



  
  

</body>

</html>
