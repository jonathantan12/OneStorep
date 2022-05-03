<?php
  // Initialize the session
  session_start();
  
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["email"])){
    header("location: adminLogin.html");
    exit;
  }

  if($_SESSION['role'] != 'admin'){
    header("location: adminLogin.html");
    exit;
  }
  // if ($_SESSION["account_id"] != $_GET['account_id']){
  //   $account_id = $_SESSION["account_id"];
  //   header("location: index.php?account_id=$account_id");
  //   exit;
  // }

  $user_name = $_SESSION['user_name'];
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OneStorep Admin Dashboard</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">One<span style="color: #009cea;">Storep</span> Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <i class="bx bxs-user"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user_name; ?></span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-contact.php">
                <i class="bi bi-question-circle"></i>
                <span>Contact the Team</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

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
        <a class="nav-link " href="index.php?account_id=$account_id">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="addUserPage.php">
          <i class="bi bi-arrow-up-square"></i>
          <span>Add User</span>
        </a>
      </li>
      <!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href='assets/classes/logout.php'>
          <i class="bi bi-box-arrow-right"></i>
          <span>Sign Out</span>
        </a>
      </li>
    

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <!-- <h1>Dashboard</h1> -->
      <h1 id="DisplayCompanyName"></h1>
      <br>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->
   
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg">
          <div class="row">
            
            <!-- Inventory Dashboard -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Inventory Update</h5>

                  <!-- Javascript table display -->
                  <div id="displayCompanyInventorySent"> </div>
              
                </div>

              </div>
            </div>
            <!-- End Inventory Dashboard -->

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
  <script src="assets/js/inventory.js"></script>
  <script src="assets/js/admin.js"></script>

  <script type="text/javascript">
    window.onload = function(){
        companyInventorySentDashboard(account_id);

        var params = new URLSearchParams(location.search);
        var company_name = params.get('company_name');
        document.getElementById('DisplayCompanyName').innerHTML = company_name + ' Dashboard';
      
        document.getElementById('floatingCompanyId').value = atob(account_id);
    };

  </script>

</body>

</html>