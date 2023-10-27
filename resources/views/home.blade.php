<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ URL('images/logo-lgu.png') }}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include jQuery (required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }
    .header-left {
      display: flex;
      align-items: center;
    }
    .header-right {
      display: flex;
      align-items: center;
    }
    .profile-dropdown {
      position: relative;
      cursor: pointer;
      margin-right: 20px; /* dungag ug margin para maka kuha ug space sa tunga sa Profile ug menu */
    }
    .profile-dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      right: 0; /* Adjust the position to align with the right side */
    }
    .profile-dropdown-content a {
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    .profile-dropdown:hover .profile-dropdown-content {
      display: block;
    }
    #hero {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 50vh;
    }
    .hero-content {
      text-align: center;
    }
    .hero-content h2 {
      font-size: 70px;
    }
    .hero-content p {
      font-size: 16px;
    }
    .hero-content a.btn {
      background-color: #098309;
      color: white;
      border: 2px solid #e7ece2;
      padding: 10px 20px;
      border-radius: 20px;
      text-decoration: none;
    }
    .menu-box {
      display: flex;
      justify-content: space-between;
      overflow: hidden;
    }
    .menu-item {
      flex: 1;
      margin: 0 5px;
      padding: 20px 20px;
      border: 3px solid #c2f8bb;
      border-radius: 10px;
      color: #fcfffcf5;
      text-align: center;
      font-size: 25px;
      transition: transform 0.3s ease;
      position: relative;
      cursor: pointer;
    }
    .menu-item:hover {
      transform: scale(1.05);
    }
    .menu-item::before {
      content: 'SELECT';
      display: none;
      position: absolute;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%);
    
      color: #c2f8bb;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 16px;
      z-index: 1;
    }
    .menu-item:hover::before {
      display: block;
    }
  </style>
</head>

<body style="background-color: #228B22">
  <header id="header" class="header" style="background-color: #228B22">
    <div class="header-left">
      <img style="width: 60px;" src="{{ URL('images\logo-lgu.png') }}" alt="LGU Logo">
      <h1 class="logo h1 ml-3" style="color: rgb(255, 255, 255);"><strong>LOCAL GOVERNMENT UNIT</strong> | <span> Gensan Public Market </span></h1>
    </div>
    <div class="header-right">
      <div class="profile-dropdown">
        <div style="color: rgb(255, 255, 255);"> {{ Auth::user()->fname }} </div>
        <div class="profile-dropdown-content">
          <a href="#">Manage</a>
          <a href="/logout" onclick="confirmLogout()">Log out</a>
        </div>
      </div>
    </div>
  </header>

  
  <section id="hero" class="hero" style="background-color: #228B22">
    <div class="container position-relative">
        <div class="hero-content">
            <h2>Welcome to <span style="color: rgb(255, 255, 255)">the Rental and Billing System</span></h2>
            <h4><span style="text-decoration: overline; color: rgb(255, 255, 255)">With SMS Notification</span></h4><br>
            <h5 style="color:#ffffff">The rental billing system provides an overview of stall holders 
            along with their associated stalls and acquired violations that will keep them on track for their payments</h5>
          </div>
    </div>
  </section>

  <div class="menu-box">
    <div class="menu-item">
      <a class="nav-link active" href="/clients">
        <i class="bi bi-file-person"style="font-size: 36px;"></i>
        <h2 class="text-center"><strong>STALL HOLDERS</strong></h2>
        <h6 class="text-center" style="color: rgb(192, 247, 167)">Manage Stall Holders</h6>
      </a>
    </div>
    <div class="menu-item">
      <a class="nav-link active" href="/stall-number/index">
        <i class="bi bi-shop" style="font-size: 36px;"></i>
        <h2 class="text-center"><strong>STALLS</strong></h2>
        <h6 class="text-center" style="color: rgb(192, 247, 167)">View all Stalls</h6>
      </a>
    </div>

    <div class="menu-item">
        <a class="nav-link active" href="/violations">
          <i class="bi bi-exclamation-triangle" style="font-size: 36px;"></i>
          <h2 class="text-center"><strong>VIOLATIONS</strong></h2>
          <h6 class="text-center" style="color: rgb(192, 247, 167)">View Violations' List</h6>
        </a>
      </div>

    <div class="menu-item">
        <a class="nav-link active" href="/stall-types">
        
                <i class="bi bi-shop" style="font-size: 36px;"></i>
                <i class="bi bi-info-circle" style="font-size: 36px; margin-left: 10px;"></i>
            <h2 class="text-center"><strong>MARKET STALLS</strong></h2>
            <h6 class="text-center" style="color: rgb(192, 247, 167)">Manage Stall Based on <br> Category</h6>
            
        </a>
        
    </div>

    <div class="menu-item">
      <a class="nav-link active" href="/client_info">
        <i class="bi bi-clipboard2-data" style="font-size: 36px;"></i>
        <h2 class="text-center"><strong>STALL HOLDER INFORMATION</strong></h2>
        <h6 class="text-center" style="color: rgb(192, 247, 167)">View Stall Holders with associated <br> stalls</h6>
      </a>
    </div>
    <div class="menu-item">
      <a class="nav-link active" href="/billing-record">
        <i class="bi bi-card-list"  style="font-size: 36px;"></i>
        <h2 class="text-center"><strong>RECORDS</strong></h2>
        <h6 class="text-center" style="color: rgb(192, 247, 167)">Overall view of <br>Stall holders information</h6>
      </a>
    </div>
  </div>


  <div class="content">
  @yield('stall-holders.create')
  @yield('clients.index')
  @yield('clients.addclients')
  @yield('client_info.index')
  @yield('client_info.add')
  @yield('client_info.edit')
  @yield('client_info.violationbilling')
  @yield('client_info.report-citation')
  @yield('client_info.citation')
  {{-- @yield('clients.edit') --}}
  @yield('billings.index')
  @yield('billings.create')
  @yield('violations.index')
  @yield('violations.create')
  @yield('violations.edit')
  @yield('stall-number.index')
  @yield('stall-number.create')
  @yield('stall-types.index')
  @yield('stall-types.create')
  @yield('stall-types.edit')
  @yield('stall-types.stallnumbers.view')
  @yield('stall-types.stallnumbers.create')
  @yield('clientrecords.index')
  @yield('home')
  @yield('scripts') 
  @yield('billing.record') 
  @yield('payments.create')
  </div>

  

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
  <script>
        function confirmLogout() {
      if (confirm("Are you sure you want to log out?")) {
        window.location.href = "{{ route('logout') }}";
      }
    }
  </script>
 
</body>

</html>
