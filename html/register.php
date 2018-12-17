<?php
    include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Avoid Monatophobia Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">기관 등록</div>
        <div class="card-body">
          <form name ="form" action="register_insert.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="admin_ID" name="admin_id" class="form-control" placeholder="ID" required="required">
                <label for="admin_ID">ID</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="admin_pw" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="c_admin_pw" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="Name" name="admin_name" class="form-control" placeholder="Name" required="required">
                <label for="Name">Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="admin_company" name="admin_company" class="form-control" placeholder="Company" required="required">
                <label for="admin_company">Company</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="admin_phone" name="admin_phone" class="form-control" placeholder="Phone Number" required="required">
                <label for="admin_phone">Phone Number (000-0000-0000)</label>
              </div>
            </div>
            <label>
              <div align="text-center">
                <input type="submit" name="send" value="Register">
              </div>
            </label>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <!--<a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
