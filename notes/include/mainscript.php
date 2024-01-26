<!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>

if($('#bool').val() == 0 && $('#usertype').val() == '3'){
  // console.log($('#bool').val());
  alert('Please fill upp the blank space');
    }
//   $(document).ready(function() {
    $('#updateInfoSub').on('click', function(e){
    
      var impdata = {
         'username' : $('#var').val(),
         'fname'    : $('#fname').val(),
         'mname'    : $('#mname').val(),
         'lname'    : $('#lname').val()
      }

      $.ajax({
          type : 'POST',
          url  : '../process/globalprocess.php',
          data : impdata,
          success: function(response) {
            
          }
      })

    });
      
    
      // console.log($('#bool').val());
    

// });
  </script>
