<?php
  
include "config.php";

$user_id = $_GET['user_id'];

$query = "SELECT * FROM user WHERE user_id='$user_id'";
$res = mysqli_query($conn, $query);
$a = mysqli_fetch_array($res);

$user_name = $a['user_name'];
$user_birth = $a['user_birth'];
$user_phone = $a['user_phone'];
$user_address = $a['user_address'];
$admin_id = $a['admin_id'];
$user_family = $a['user_family'];

?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Modify User</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Admin Page</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Modify User</li>
          </ol>

          <!-- Page Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              선택한 유저의 정보를 수정합니다.</div>
              <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-header">유저 수정</div>
                <div class="card-body">
                  <form name ="form" action="modify_insert.php" method="post">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_id" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_id_" name="new_id" class="form-control" placeholder="동일한 ID를 입력해주세요." required="required">
                            <label for="user_id_">수정할 ID(이전과 동일한)를 입력해주세요.</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_name" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_name_" name="new_name" class="form-control" placeholder="new Name" required="required">
                            <label for="user_name_">new Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_birth" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_birth_" name="new_birth" class="form-control" placeholder="new birth" required="required">
                            <label for="user_birth_">new Birth</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_phone" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_phone_" name="new_phone" class="form-control" placeholder="new phone" required="required">
                            <label for="user_phone_">new Phone</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_address" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_address_" name="new_address" class="form-control" placeholder="new Address" required="required">
                            <label for="user_address_">new Address</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <?php echo "$user_family" ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="user_family_" name="new_family" class="form-control" placeholder="new family" required="required">
                            <label for="user_family_">new Family</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <label>
                      <div align="text-center">
                        <input type="submit" name="send" value="수정">
                      </div>
                    </label>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Korea University, Software Engineering 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout 확인</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">노인 관리를 종료하고, 로그아웃 하시겠습니까?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
            <a class="btn btn-primary" href="login.php">로그아웃</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
