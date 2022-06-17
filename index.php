<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Login</title>

  <link rel='stylesheet' href='assets/css/bootstrap.min.css'>
  <!-- <link rel='stylesheet' href='assets/css/font-awesome.min.css'> -->
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
if (isset($_SESSION['id'])) {
  header('location:dashboard.php');
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

            <form method="POST" action="login_check.php" id="login-form" class="login-form-label go-top">
              <!--         UserName Field     -->
              <br>

              <div class="form-group">
                <input type="text" aria-describedby="text" class="form-control" id="username" name="username" autocomplete="off" tabindex=1 value="" required>
                <label for="username">Username</label>
              </div>
              <!--     Password Field         -->
              <div class="form-group" onclick="focus_text_password()">
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password" tabindex=2 autocomplete="off value=" " required>
              <label for=" password ">Password</label>
            </div>
<!--               Submit / Cancel Button && Login Help                     -->
            <div class=" form-group ">
              <div class=" text-center ">
              <br>
                <button type=" submit" class="btn btn-block btn-primary " value="Submit" abindex=3>เข้าสู่ระบบ</button>
              </div>

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
  <script>
    function focus_text_password() {
      document.getElementById("password").focus();
    }
  </script>
</body>

</html>