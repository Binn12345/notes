<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- <title>Components / Cards - NiceAdmin Bootstrap Template</title> -->
  <title>WePost | Free Post and Shares </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/vk.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    * Template Name: NiceAdmin
    * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/vk.png" alt="">
        <span class="d-none d-lg-block">WePost</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

 

   
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar -->

  <main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Cards</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Cards</li>
        </ol>
      </nav>
    </div>End Page Title -->

    <section class="section">
      <div class="row align-items-top">
            <div class="pagetitle">
                <h1>Force Create an account</h1>
                <nav>
                    <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <div class="row mb-3">
                <!-- <label class="col-sm-2 col-form-label">Floating labels</label> -->
                <div class="col-sm-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingUsername" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="" selected>- Select User Type -</option>
                    <option value="1">Superadmin</option>
                    <option value="2">Admin</option>
                    <option value="3">User</option>
                    </select>
                    <label for="floatingSelect">User Types</label>
                </div>
                <div class="col-12">
                      <button class="btn btn-primary w-100" id='btnfrccreate'>Create</button>
                    </div>
                </div>  
            </div>

      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>


$('#btnfrccreate').on('click',function(e){
      
      var formData = {
        'username' : $('#floatingUsername').val().trim(),
        'password' : $('#floatingPassword').val().trim(),
        'type'     : $('#floatingSelect').val()
      };

      $.ajax({

        type: 'POST',
        url: 'process/forcetoallow_users.php',
        data: formData,
        success: function(response) {

          var jsonResponse = JSON.parse(response);

          var status = jsonResponse.status;
          var message = jsonResponse.message;
           

              if (status === "error") {
                // console.error(dta.message);
                // Handle the error as needed
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        background: '#f64341',
                        color: '#ffff',
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.resumeTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: status,
                        title: message
                    })

                // alert('dksodkoskods');
            } else {
               Swal.fire({
                    text: 'Fill up all required fields',
                    icon: 'info',
                    showCancelButton: false,
                    showConfirmButton: false,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 2000,
                    background: '#f64341',
                    color: '#ffff',
                    timerProgressBar: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to another page
                        // window.location.href = 'index.php';
                    }
                });
                // Process the response if it's not an error
                console.log("Success:", response.message);
                // Additional logic for successful response
            }

              
            
        }

      });



    });
  $(document).ready(function() {

  
  });

  </script>

</body>

</html>