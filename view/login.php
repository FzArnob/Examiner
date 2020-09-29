<?php include '../controllers/controller.php'?>
<?php
// redirect user to index page if logged in
if (!empty($_SESSION['email'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../view/assets/css/main.css" />
  <title>Examiner</title>
  <link rel="shortcut icon" href="../view/images/e.png" type="image/x-icon" />
</head>
<body style="background: #0a3653;">
  <img src="../view/images/bg.jpg" style="position: fixed; right: 0; top: 0; z-index: -999;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper auth login" style="text-align: center;">
          <img src="../view/images/e.png" width="80" height="80" style="text-align: center;">
          </br>
        <h3 class="text-center form-title"style="color: white; font: caption; font-size: 20px;">Login to Examiner</h3>
      </br>
        <form action="login.php" method="post">
          <div class="form-group">
            <label style="color: white; font: caption;">Email</label>
            <input style="font-size: 15px;" type="text" name="email" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;">Password</label>
            <input style="font-size: 15px;" type="password" name="password" class="form-control form-control-lg">
          </div>
          <?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
          <div class="form-group">
            <button   name="login-btn" class="btn btn-lg btn-block" style="line-height: 0px; padding: 20px; background: #25a8b2; color: white;">Login</button>
          </div>
        </form>
        <p style="color: white; font: caption;">Don't yet have an account? <a style="color: #25a8b2;" href="signup.php">Sign up</a></p>
      </div>
    </div>
  </div>
  <footer id="footer">
        <div class="container">
          
        </div>
        <div class="copyright">
          &copy; Examiner. All rights reserved. Designed by Fz Arnob</a>
        </div>
      </footer>
</body>
</html>