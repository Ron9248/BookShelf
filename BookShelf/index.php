<?php
session_start();
error_reporting(0);
include ('includes/config.php');
if ($_SESSION['login'] != '') {
  $_SESSION['login'] = '';
}
if (isset($_POST['login'])) {
  //code for captach verification
  // if ($_POST["vercode"] != $_SESSION["vercode"] or $_SESSION["vercode"] == '') {
  //   echo "<script>alert('Incorrect verification code');</script>";
  // } else {
  $email = $_POST['emailid'];
  $password = md5($_POST['password']);
  $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId=:email and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);

  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['stdid'] = $result->StudentId;
      if ($result->Status == 1) {
        $_SESSION['login'] = $_POST['emailid'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
      } else {
        echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

      }
    }

  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}
// }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>BookShelf | </title>
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
  <!------MENU SECTION START-->
  <?php include ('includes/header.php'); ?>
  <!-- MENU SECTION END-->
  <video autoplay loop muted play-inline class="video">
    <source src="assets/img/bookflip2.mp4" type="video/mp4">
  </video>
  <div class="content-wrapper">
    <div class="container">
      <div class="row pad-botm">
        <div class="col-md-12">
          <h4 class="header-line">USER LOGIN FORM</h4>
        </div>
      </div>
      <!--LOGIN PANEL START-->
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              LOGIN FORM
            </div>
            <div class="panel-body">
              <form role="form" method="post">

                <div class="form-group">
                  <label>Enter Email id</label>
                  <input class="form-control" type="text" name="emailid" required autocomplete="off" />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="password" required autocomplete="off" />
                  <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
                </div>
                <!-- 
                <div class="form-group">
                  <label>Verification code : </label>
                  <input type="text" class="form-control1" name="vercode" maxlength="5" autocomplete="off" required
                    style="height:25px;" />&nbsp;<img src="captcha.php">
                </div> -->

                <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not
                  Register Yet</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!---LOGIN PABNEL END-->


    </div>
  </div>
  <!-- new code added -->

  <div class="row">

    <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
      <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

        <div class="carousel-inner">
          <div class="item active">
            <img src="admin/assets/img/1.jpg" alt="" />
          </div>
          <div class="item">
            <img src="admin/assets/img/2.jpg" alt="" />
          </div>
          <div class="item">
            <img src="admin/assets/img/3.jpg" alt="" />
          </div>
        </div>
        <!--INDICATORS-->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example" data-slide-to="1"></li>
          <li data-target="#carousel-example" data-slide-to="2"></li>
        </ol>
        <!--PREVIUS-NEXT BUTTONS-->
        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
  </div>
  <!-- new code added -->
  <!-- CONTENT-WRAPPER SECTION END-->
  <?php include ('includes/footer.php'); ?>
  <!-- FOOTER SECTION END-->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="assets/js/custom.js"></script>

</body>

</html>