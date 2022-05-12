<?php
  // Initialize the session
  session_start();
  
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["email"])){
    header("location: dashboardLogin.html");
    exit;
  }

  if ($_SESSION["account_id"] != $_GET['account_id']){
    $account_id = $_SESSION["account_id"];
    header("location: ordersDone.php?account_id=$account_id");
    exit;
  }

  if($_SESSION['role'] != 'user'){
    header("location: dashboardLogin.html");
    exit;
  }

  $company_name = $_SESSION['company_name'];
//   $account_id = $_SESSION['account_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OneStorep Business Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/OneStorep.png" rel="icon">
  <link href="assets/img/OneStorep.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php?account_id=$account_id" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">One<span style="color: #009cea;">Storep</span> Business</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <i class="bx bxs-user"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $company_name; ?></span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li class="nav-item">
                <a class="dropdown-item d-flex align-items-center" href="index.php?account_id=$account_id">
                <i class="bi bi-grid"></i>
                <span>Available Inventory</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="dropdown-item d-flex align-items-center" href="arrangeDelivery.php?account_id=$account_id">
                <i class="bi bi-box-seam"></i>
                <span>Arrange Delivery</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="dropdown-item d-flex align-items-center" href="toBeSent.php?account_id=$account_id">
                <i class="bi bi-truck"></i>
                <span>Orders to be Sent</span>
                </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="ordersDone.php?account_id=$account_id">
                <i class="bi bi-archive"></i>
                <span>Orders Fulfilled</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-contact.php">
                <i class="bi bi-question-circle"></i>
                <span>Contact the Team</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href='assets/classes/logout.php'>
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?account_id=$account_id">
          <i class="bi bi-grid"></i>
          <span>Available Inventory</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="arrangeDelivery.php?account_id=$account_id">
          <i class="bi bi-box-seam"></i>
          <span>Arrange Delivery</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="toBeSent.php?account_id=$account_id">
          <i class="bi bi-truck"></i>
          <span>Orders to be Sent</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="ordersDone.php">
          <i class="bi bi-archive"></i>
          <span>Orders Fulfilled</span>
        </a>
      </li>
      <!-- End Orders Fulfilled -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact the Team</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href='assets/classes/logout.php'>
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
      <!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Orders Fulfilled</h1>
      <br>
    </div><!-- End Page Title -->
   
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg">
          <div class="row">

            <!-- Orders Fulfilled -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Consolidated Orders Fulfilled</h5>
                    <!-- Javascript table display -->
                    <div id="displayOrdersDoneTable"> </div>

                </div>

              </div>
            </div><!-- End of Consolidated Inventory -->

            <!-- Orders Fulfilled with Individual Breakdown -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Orders Fulfilled with Individual Breakdown</h5>
                    <!-- Javascript table display -->
                    <div id="displayIndOrdersDoneTable"> </div>

                </div>

              </div>
            </div><!-- End of Orders Fulfilled with Individual Breakdown-->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/ordersDone.js"></script>

  <script type="text/javascript">    
    window.onload = function(){
        var params = new URLSearchParams(location.search);
        var account_id = params.get('account_id');
        ordersDoneDashboard(account_id);
    };

  </script>

</body>

</html>