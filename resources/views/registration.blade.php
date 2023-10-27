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

    /* Apply the slide-up animation to the Hero Section */
    #hero {
      animation: slide-up 1.5s forwards;
    }
    /* Custom CSS to style the logo, and change text color */
    .logo img {
        max-width: 80px; /* Adjust the size of the logo */
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
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">2022_cete_casuyonpc@online.htsgsc.edu.ph</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+63 977-419-5927</span></i>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="https://www.facebook.com/LguGensan" class="facebook"><i class="bi bi-facebook"></i>Visit LGU-Gensan</a>
      </div>

      </div>
      
    </div>
    
  </section><!-- End Top Bar -->



  <header id="header" class="header d-flex align-items-center logo img ">
  <div class="container-fluid container-xl d-flex align-items-center">
    <img src="{{ URL('images\logo-lgu.png') }}" alt="LGU Logo">
        <h1 class="logo h1"style="color: white;"><strong>LOCAL GOVERNMENT UNIT</strong> |<span> General Santos City</span>.</h1>
    </div> 
  </header>

  <section id="hero" class="hero">
    <div class="container position-relative">
        <div id="login-form-container" class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center font-weight-bold-mb-2"><h3><strong>REGISTER</strong></h3></div>
                        <div class="card-body">




                          <form method="POST" action="{{ route('registrationp') }}" class="registration-container mx-auto">
                            @csrf
                      
                                <div class="container mt-4">
                                  <div class="mb-3 row">
                                    <div class="col-md-6">
                                      <label for="fname" class="form-label">First Name</label>
                                      <input type="text" name="fname" id="fname" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="mname" class="form-label">Middle Name</label>
                                      <input type="text" name="mname" id="mname" class="form-control">
                                    </div>
                                  </div>
                      
                                  <div class="mb-3 row">
                                    <div class="col-md-6">
                                      <label for="lname" class="form-label">Last Name</label>
                                      <input type="text" name="lname" id="lname" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="email" class="form-label">Email Address</label>
                                      <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                  </div>
                      
                                  <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                  </div>
                      
                                  <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                </div>
                      
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-block btn-oblong">Register</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                        
                    </div><br>

                </div>
                <div class="col-lg-6">
                    <h2>Admin Registration</h2>
                    

                    
                    <p><strong>Already an Administrator? <a
                        href="/"
                        class="btn btn-success btn-oblong pulsate" 
                        style="background-color: #098309; color:
                                                 white; border: 2px solid 
                                              #e7ece2;" > LOG IN HERE</a></strong>



                </div>
                
            </div>
        </div>
    
    </div>
         



    </div>
  </section>

  
  
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  </body>
  
  </html>
 
  
  
  
  
  
  