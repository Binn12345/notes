<?php 

    // var_dump('<pre>',$_GET,$_POST,$_SESSION,get_defined_vars());die;
    session_start(); 
    include_once '../config/dbconnection.php'; 
    include_once '../class/user_checker.php'; 
    include_once '../class/information.php'; 


    if (!isset($_SESSION['user_authenticated']) || $_SESSION['user_authenticated'] !== true) {
      // User is not authenticated; redirect to the login page
      header('Location: ../?');
      exit;
    } 

    $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
    // $userKey = $_SESSION['guest'];
    $h = $_SESSION['last_activity'] ?? "";
    $username = $_GET['username'];
    $user_data = new MyClass();
    $dta = $user_data->user_info($username,$conn);
    $usertype = $dta['usertype'];
    
    $booldta = $_SESSION['userdata']['fname'] ? true : false;
    // var_dump('<pre>',$_SESSION['userdata'],$bool);die;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once '../include/mainheader.php' ?>
</head>

<body>
  <input type="hidden" id="bool">
  <?php include_once '../include/bodyheader.php' ?>
  <?php include_once '../include/bodysidebar.php' ?>

  <main id="main" class="main">
    <?php include_once '../include/yield.php' ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <?php include_once '../include/footer.php' ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include_once '../include/mainscript.php' ?>

</body>

</html>