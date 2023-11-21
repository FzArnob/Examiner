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
      <div class="col-md-4 offset-md-4 form-wrapper auth" style="text-align: center;">
          <img src="../view/images/e.png" width="80" height="80" style="text-align: center;">
          </br>
        <h3 class="text-center form-title" style="color: white; font: caption; font-size: 20px">Register to Examiner</h3>
</br> 
        <?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
        
        <form action="signup.php" method="post">
          <div class="form-group">
            <label style="color: white; font: caption;" >Username</label>
            <input style="font-size: 15px;" type="text" name="username" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Email</label>
            <input style="font-size: 15px;" type="email" name="email" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Contact Number</label>
            <input style="font-size: 15px;" type="text" name="number" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Institution</label>
            <input style="font-size: 15px;" type="text" name="institution" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Date of Brith</label>
            <input style="font-size: 15px;" type="date" name="DofB" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Password</label>
            <input style="font-size: 15px;" type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label style="color: white; font: caption;" >Password Confirm</label>
            <input style="font-size: 15px;" type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          
            <button type="submit" name="signup-btn" class="btn btn-lg btn-block" style="line-height: 0px; padding: 20px; background: #25a8b2; color: white;">Sign Up</button>
          
        </form>
        <p style="color: white; font: caption;">Already have an account? <a style="color: #25a8b2;" href="login.php">Login</a></p>
      </div>
    </div>
  </div>
  <footer id="footer">
        <div class="copyright">
          &copy; 2021, Examiner. All rights reserved.</a>
        </div>
      </footer>
</body>
</html>