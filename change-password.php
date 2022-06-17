<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>เปลี่ยนรหัสผ่าน</title>

  <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
  <!-- <link rel='stylesheet' href='assets/css/font-awesome.min.css'> -->
  <link rel="stylesheet" href="assets/assets-dashboard/materialize/css/materialize.min.css" media="screen,projection" />
  <!-- Bootstrap Styles-->
  <link href="assets/assets-dashboard/css/bootstrap.css" rel="stylesheet" />
  <!-- FontAwesome Styles-->
  <link href="assets/assets-dashboard/css/font-awesome.css" rel="stylesheet" />
  <!-- Morris Chart Styles-->
  <link href="assets/assets-dashboard/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- Custom Styles-->
  <link href="assets/assets-dashboard/css/custom-styles.css" rel="stylesheet" />
  <link href="assets/css/custom-table.css" rel="stylesheet" />
  <link href="assets/css/preload.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/spinner.css" rel="stylesheet" type="text/css" />

  <link href="assets/css/style2.css" rel="stylesheet" type="text/css" />
  <link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

  <!-- Google Fonts-->
  <link rel="stylesheet" href="assets/assets-dashboard/js/Lightweight-Chart/cssCharts.css">

  <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/select2/css/select2-bootstrap.css" rel="stylesheet" type="text/css" />
  <?php require_once('connection.php'); ?>

  <style>
    @import url("assets/css/googleapis.css");




    body {
      margin: 25px auto;
      height: 100%;

      font-family: "Open Sans", sans-serif;
      height: 100%;
      background-color: #cccccc;
    }

    .btn-primary {
      color: #fff;
      background-color: #BA2B73;
      border-color: #BA2B73;
    }

    .bg {
      /* The image used */
      background-image: url("assets/images/bg.png");

      /* Full height */
      margin-top: 15vh;
      height: 100vh;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;


    }

    h2 {
      font-size: 1.25em;
    }

    .fa-sign-in {
      color: #80b958;
    }

    * {
      box-sizing: border-box;
    }

    #login-form {
      margin-top: -1rem;
    }

    #login-form>div.form-group:nth-of-type(1),
    #login-form>div.form-group:nth-of-type(2) {
      position: relative;
      overflow: hidden;
    }

    #login-form input.form-control:not(.btn-primary) {
      padding: 0.9rem;
      -webkit-box-shadow: inset 0 0 1px #eee, #fff 0 0 1px;
      -webkit-box-shadow: inset 0 0 1px #eee, #fff 0 0 1px;
      border: 0;
      border-radius: 0;
      outline: 0;
      background: transparent;
      border-bottom: 1px solid #ccc;
      width: 100%;
    }

    #login-form input.form-control:focus:not(.btn-primary) {
      border: 0;
      border-radius: 0;
      outline: 0;
      border-bottom: 1px solid #272361;
    }

    #login-form label,
    #login-form input+label {
      position: absolute;
      top: 0;
      right: 1px;
      bottom: 1px;
      left: 0.5em;
      z-index: 1;
      height: 1em;
      font-size: 0.9rem;
      line-height: 3.25em;
      color: #999;
      white-space: nowrap;
      cursor: text;
      transition: all 0.1s ease;
    }

    #login-form input.form-control:focus:not(.btn-primary)+label {
      font-size: 0.7rem;
      font-weight: bolder;
      left: 5px;
      top: -8px;
      color: #272361;
    }

    #login-form input:valid:not(.btn-primary)+label {
      opacity: 0;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
  </style>
</head>
<?php
session_start();
include('connection.php');
if (isset($_SESSION['id'])) {
  $query = mysqli_query($conn, "select * from users where id='" . $_SESSION['id'] . "'");
  $row = mysqli_fetch_array($query);
}
?>

<body class="bg">
  <div class="container" id="container-loginForm">



    <div class="row justify-content-center">
      <div class="col-sm-6 col-md-6 col-lg-5">
        <div class="card portal-card">
          <img src="assets/images/rjlogo.jpg" class="center" style="margin-top: 20px;height: 160px; width: 365px;">
          <div class="card-body" id="loginForm">

            <?php

            if (isset($_SESSION['nologin'])) {

              echo '<div class="alert alert-danger"><strong>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!!!</strong></div>';
              unset($_SESSION['nologin']);
            }
            ?>

            <form method="POST" action="password-change.php" id="login-form" class="login-form-label go-top">
              <!--         UserName Field     -->
              <br>

              <div class="form-group">
                <input type="text" aria-describedby="text" class="form-control" id="username" name="username" autocomplete="off" placeholder="Username" tabindex=1 value="" required>
              </div>
              <!--     Password Field         -->
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password" tabindex=2 placeholder="Password" autocomplete="off" required>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" id="newpassword" name="newpassword" aria-describedby="newpassword" placeholder="New Password" autocomplete="off" required>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="comfirmpassword" name="comfirmpassword" aria-describedby="comfirmpassword" placeholder="Comfirm Password" autocomplete="off" required>
              </div>
              <!--               Submit / Cancel Button && Login Help                     -->
              <div class=" form-group ">
                <div class=" text-center ">
                  <br>
                  <button type=" submit" class="btn btn-block btn-primary " value="Submit">เปลี่ยนรหัสผ่าน</button>
                </div>
                <p align="right">

                  <a href="<?php
                            if ($_SESSION['rolename'] == 'Nurse') {
                              echo 'askforblood.php';
                            } else {
                              echo 'dashboard.php';
                            }
                            ?>">ย้อนกลับ</a>
                </p>

            </form>
            <div style="height: 15px;"></div>
            <div style="color: red; font-size: 15px;">
              <center>
                <?php

                if (isset($_SESSION['msg'])) {
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
                }
                ?>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="assets/js/spinner.js"></script>
  <!-- Bootstrap Js -->
  <script src="assets/assets-dashboard/js/jquery-1.10.2.js"></script>
  <script src="assets/assets-dashboard/js/bootstrap.min.js"></script>
  <script src="assets/assets-dashboard/materialize/js/materialize.min.js"></script>
  <!-- Metis Menu Js -->
  <script src="assets/assets-dashboard/js/jquery.metisMenu.js"></script>
  <!-- Morris Chart Js -->
  <script src="assets/sweetalert/sweetalert.min.js"></script>

  <!-- Custom Js -->
  <script src="assets/js/menu.js"></script>

  <script src="assets/plugins/select2/js/select2.min.js"></script>
  <script src="assets/js/DateTimeFormat.js"></script>
  <script>
    var status_pas = <?php echo $_GET['status_pas']; ?>
  </script>
  <script>
    $(document).ready(function() {
      alertstatus();
    });

    function alertstatus() {
      if (status_pas == 1) {
        swal({
          title: 'บันทึกสำเร็จ',
          type: 'success',
          confirmButtonText: 'OK',
          allowOutsideClick: false
        })
      } else if (status_pas == 2) {
        swal({
          title: 'เกิดข้อผิดพลาด',
          type: 'warning',
          confirmButtonText: 'OK',
          allowOutsideClick: false
        })
      } else if (status_pas == 3) {
        swal({
          title: 'ยืนยันรหัสผ่านไม่ถูกต้อง',
          type: 'warning',
          confirmButtonText: 'OK',
          allowOutsideClick: false
        })
      }
    }
  </script>
</body>

</html>