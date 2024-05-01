<?php 

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  
</head>
<body class="" style="background-color: #3d061a0d;">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto">
              <div class="card card-plain">
                <center>
                <div class="card-header" style="background-color: #881e4324;">
                  <h3 style="color: #671431;">Smart Cafe</h3>
                  <h4 class="font-weight-bolder" style="color: #671431;">Registration</h4>
                  <p class="mb-0" style="color: #590f2ab0;">Welcome!<br> Give Your Details to Register With Smart Cafe.</p>
                </div>
                </center>
                <div class="card-body" style="background-color: #881e430f;">


                  <form role="form" action="adminFun/addNewCustomerFun.php" method="POST">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="uname" placeholder="Name"
                      style="background-color: #ffffffa1;" class="form-control" required>
                    </div>

                    <div class="input-group input-group-outline mb-3">                   
                      <input type="email" id="" name="email" placeholder="Email"
                      style="background-color: #ffffffa1;" class="form-control" required>
                    </div>

                    <div class="input-group input-group-outline mb-3">                    
                      <input type="password" name="nic_Number" placeholder="NIC"
                      style="background-color: #ffffffa1;" class="form-control" required>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="dbname" placeholder="DB Name"
                      style="background-color: #ffffffa1;" class="form-control" required>
                    </div>


                    <div class="input-group input-group-outline mb-3">                    
                    <input type="password" name="psw" placeholder="password"
                    style="background-color: #ffffffa1;" class="form-control" required>
                    </div>

                     <div class="input-group input-group-outline mb-3">                     
                      <input type="password" name="psw-repeat" placeholder="Retype password"
                      style="background-color: #ffffffa1;" class="form-control" required>
                    </div>
                   
                    <div class="text-center">
                      <button type="input" name="Sign_submit"
                      style="background-color: #ffffffa1;" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up </button>
                    </div>
                  </form>

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="adminSignIn.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
 
  <script async defer src="https://buttons.github.io/buttons.js"></script>
 
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>