<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<?php
include_once "../../../controller/userC.php";
include_once "../../../model/user.php";
include_once "../../../config.php";

$userC = new UserC();

session_start(); // khatrr amlna session 

$error = null;

// get tithabat fil lien post tithabit fil input il louta

if (
  isset($_POST['name']) &&
  isset($_POST['phone']) &&
  isset($_POST['email']) &&
  isset($_POST['password']) 
) {
  
  if(empty($_POST['name'] ) ||
  empty($_POST['phone'] )   ||
  empty($_POST['email'] )   ||
  empty($_POST['password'] ))
  {
    $error = "field are empty";
  }
  else
  {
    if (strlen($_POST['name']) > 5){
      
    if (strlen($_POST['password']) > 8){
      if (preg_match('/^\d{8}$/', $_POST['phone'] ))
       {  
        $user = new User(null , $_POST['name'], $_POST['phone'],$_POST['email'],$_POST['password'],$_POST['role']); // constructter 
    
      $userC->adduser($user);// function mita3 ajout fil database

      $_SESSION['name'] = $_POST['name']; 
      setcookie('name', $_POST['name'], time() + (86400 * 30), "/"); // pour sauvegarder les donnes 
      
      header('Location: dashboard.php');

      } else {
        $error =  'Input is not a number with 8 digits';
      }
    }
    else{
      $error = "password must be > 8";
    }
      
    }
    else{
      $error = "name must be > 5";
    }
    
  }
  
  if($error != null)
  {
    echo "<script>alert('".$error."')</script>";
  }  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
    <br><br><br><br><br><br><br><br><br><br>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>Register </h5>
              </div>
              <div class="card-body">
                <form role="form text-left" method="post">
                  <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                  </div>
                  <div class="mb-3">
                    <input type="number" name="phone" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone-addon">
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                  </div>
                  <label>Role:</label>
                  <select name="role">
                  <option value="0">Administrator</option>
                  <option value="1">Organisateur</option>
                  <option value="2">Participant</option>
                  </select>
                    
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                    
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account? <a href="sign-in.php" class="text-dark font-weight-bolder">Sign in</a></p>
                </form>
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
    if (win || document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>