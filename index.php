
<?php include './controllers/controller.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['email'])) {
    header('location: ./view/login.php');
} elseif ($_SESSION['email'] == "adminCSX_$#9087@examiner.cf") {
    header('location: ./view/admin.php');
}
?>
<!DOCTYPE html>

<html lang="en">
<title>Examiner</title>
<link rel="shortcut icon" href="./view/images/e.png" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php if($page === 0) { ?>
<head>
  
    <link rel="stylesheet" href="./view/assets/css/main.css" />
  </head>
<body style="background: #0a3653;">

<section id="main" style="border-radius: 5px;">
        <div class="inner" style="border-radius: 5px;">

        <!-- One -->
          <section id="one" class="wrapper style1" style="border-radius: 5px;">

            <div class="image fit flush">
              <img src="./view/images/pic02.jpg" alt="" />
            </div>
            
              
<?php if (count($sucess) > 0): ?>
  <div style="background: green; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%; text-align: center;">
    <?php foreach ($sucess as $sucess): ?>
    <li>
      <?php echo $sucess; ?>
    </li>
    <?php endforeach;?>
  </div>
  </br>
  </br>
<?php endif;?>
<?php if (count($errors) > 0): ?>
  <div style="background: red; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%; text-align: center;">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
  </br>
  </br>
<?php endif;?>
        <!-- Display messages -->
        <?php if (isset($_SESSION['message'])): ?>
        <div style="background: #66c87f; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%; text-align: center;">
          <li>
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
          </li>
        </div>
 </br>
  </br>

        <?php endif;?>


<header class="special">
              <h2>Hello, <?php echo $_SESSION['username']; ?></h2>
              <p style="color: #980121; font: caption; font-size: 10px;">Here you can enroll to an exam from the list below.</p>
              </br>
              </br>
<div>

              <table>
  <tr style="background: #25a8b2; ">
    <th style="text-align: center; color: white;font: caption;padding-top: 10px;">Exam Titles</th>
    <th style="text-align: center; color: white;font: caption;">Enroll Key</th>
    <th style="text-align: center; color: white; font: caption;">Exam Times</th>
  </tr>


<?php 
$sql = "SELECT * FROM exam";
$result = mysqli_query($conn, $sql);








if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        
      ?>


  <tr style="background: #dfe9ea">
    <th style="text-align: center; color: black;font: caption;padding-top: 10px;"><?php echo $row["title"]?></th>
    <th style="text-align: center; color: black;font: caption;padding-top: 10px;"><?php echo $row["id"]?></th>
    <th style="text-align: center; color: black;font: caption;padding-top: 10px;">Start: <?php echo date('h:i:s a m/d/Y', strtotime($row['sdate'].' '.$row['sh'].':'.$row['sm'].':'.$row['ss']));?><br/>----------<br/>End: <?php echo date('h:i:s a m/d/Y', strtotime($row['edate'].' '.$row['eh'].':'.$row['em'].':'.$row['es']));?></th>
  </tr>
        <?php
    }
} else { ?>
    <p style="color: black; font: caption;">No Exams are avaiable currently.<p>
      </br>
              </br>
    <?php
}
?>




              </table>
              <br>
              <p id="ll" style="font-size: 13px; font: caption; color: black; text-align: center; margin: auto; background: green; border-radius: 5px; color: white;"></p>
              </br>
              <form action="index.php" method="post" class="ele_con" enctype="multipart/form-data">
              <p style="color: black">Enrollment-Key</p><input class="admin_ele" type="number" name="enroll-key" id="lk">
            </br>
            </br>
              <input style=" color: white; background: #66c87f; border-width: 0.5; border-color: #d7a23d; font: caption; border-radius: 5px; margin: auto; " type="submit" value="Enroll" name="enrolled" id="en">
              </br>
              </br>
              <input style=" color: white; background: #fe5353; border-width: 0.5; border-color: #d7a23d; font: caption; border-radius: 5px; margin: auto; " type="submit" value="Log-Out" name="logout-btn">
            </form>
            <br/>
<?php if ($wait === 1){ 
$st1= strtotime("$sdate $sh:$sm:$ss") * 1000;
$dt1 = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$nt1= strtotime($dt1->format('F j, Y, g:i:s a')) * 1000;?>
<script>
  
 var countDownDate = <?php echo $st1;?>;
 var now = <?php echo $nt1;?>;
// Update the count down every 1 second
var x = setInterval(function() {
// Find the distance between now an the count down date
var distance = countDownDate - now;
now = now + 1000;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("ll").innerHTML = "Exam will start within " + days + " days " + hours + " hours " +
minutes + " minutes " + seconds + " seconds ";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);

 document.getElementById("lk").value = <?php echo $key; ?>;
 document.getElementById("en").click();
}
    
}, 1000);

    </script>
<?php   }?>

</div>



<h2>Your Results:</h2>
              <p style="color: #980121; font: caption; font-size: 10px;">Here you can see your score in exams.</p>
              </br>
              </br>

<table>
  <tr style="background: #25a8b2; ">
    <th style="text-align: center; color: white;font: caption;padding-top: 10px;">Exam Titles</th>
    <th style="text-align: center; color: white; font: caption;">Attempted</th>
    <th style="text-align: center; color: white; font: caption;">Score</th>
  </tr>


<?php 
$email = $_SESSION['email'];
$sql = "SELECT * FROM result WHERE u_email='$email'";
$result = mysqli_query($conn, $sql);








if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>


  <tr style="background: #dfe9ea">
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["ex_title"]?></th>
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["atmp"]?> out of <?php echo $row["qnum"]?></th>
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["score"]?></th>
  </tr>
        <?php
    }
} else { ?>
    <p style="color: black; font: caption;">You have not taken any exam.<p>
      </br>
              </br>
    <?php
}
?>




              </table>








</section></div></section>

       

  <!-- Footer -->
      <footer id="footer">
        <div class="container">
          
        </div>
        <div class="copyright">
          <a style="font-size: 15px; margin-bottom: 30px;">&copy; 2021, Examiner. All rights reserved.</a>
        </div>
      </footer>

<?php }?>









<?php  if($page === 1) {
    $_SESSION['title'] = $title;
  ?>
<body style="background: #124153;" >


        <div style=" margin-left: 10px; margin-right: 10px; background: #124153; text-align: left; background-image: url(./view/images/bgex.jpg); min-height: 200px; border-radius: 5px; padding: 15px;"  >
        <p style=" color: white; font: caption; font-size: 30px;"> Examiner</p>
          <p style=" color: white; font: caption;"> Name: <?php echo $_SESSION['username']; ?></br> Test: <?php echo $title; ?></p>
  <p style="color: white;" id="hh"></p>
        </div>
      


  
<div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; padding-left: 15px; padding-right: 15px;  background: white; border-radius: 5px; font: caption;font-size: 13px; color: black; text-align: center;">
  
 
<?php if($qnum != 0){?>

<div style=" width: auto; font-size: 13px; padding: 5px; background: #d6fff2; text-align: left; border-style: solid; padding-bottom: 40px; border-width: 1px; border-color: #42bbad;">




<form action="index.php" method="post">
  
  
<p style="width: auto;">Choose your Answer:</br>[one out of five options]
  </br>
  </br>
<?php
                     for($i=1;$i<$qnum+1;$i++){

                      $num = $i;
$num_p = sprintf("%02d", $num);
?>
<p style="display: inline-block; margin-left: 5px; margin-right: 5px; margin-bottom: 0px;"><span style="background: #42bbad; padding: 10px;">[ <span style="color: white;"><?php echo $num_p; ?></span> ]</span>
  <?php
                      for ($op = 'A'; $op <= 'E'; $op++) {
                        ?>
                        <input id="a" type="radio" name="quizcheck[<?php echo $i; ?>]" id="<?php echo $i; ?>" value="<?php echo $op; ?>"  ><?php echo $op; ?>
                        <?php
                      }
                      ?>
                    </p>
                    <?php
                    }
                    ?>
                    <br>
                    <br>
                    <br>
<input style="font: caption; font-size: 15px; border-radius: 5px; border-style: solid; border-width: 1px; border-color: gray; padding: 4px; background: #42bbad; color: white;" type="submit" name="check" id="check" Value="Submit Ans" /> <br>
                    </form>


</div>

<script>
  <?php 
$et1= strtotime("$edate $eh:$em:$es") * 1000;
$dt1 = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$nt1= strtotime($dt1->format('F j, Y, g:i:s a')) * 1000;?>
var countDownDate = <?php echo $et1;?>;
 var now = <?php echo $nt1;?>;
// Update the count down every 1 second
var x = setInterval(function() {
// Find the distance between now an the count down date
var distance = countDownDate - now;
now = now + 1000;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("hh").innerHTML = "Time left: " + days + " days " + hours + " hours " +
minutes + " minutes " + seconds + " seconds ";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 document.getElementById("check").click();
}
}, 1000);

    </script>



<div style=" padding-right: 10px; display: flex; border-radius: 5px;">

<img style="width: 100%; height: auto;" src="<?php echo "./view/Questions/". $qsn; ?>">
</div>


</div>

<?php } else {?>
<div style=" padding-right: 10px; display: flex; border-radius: 5px;">

<img style="width: 100%; height: auto;" src="<?php echo "./view/Questions/". $qsn; ?>">
</div>



<script>
  
 var countDownDate = <?php 
echo strtotime("$edate $eh:$em:$es" ) ?> * 1000;
var d = new Date();
    var now = d.getTime()-(d.getTimezoneOffset()*60*1000);
// Update the count down every 1 second
var x = setInterval(function() {
    d = new Date();
  now = d.getTime()-(d.getTimezoneOffset()*60*1000);
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("hh").innerHTML = "Time: " + hours + " hours " +
minutes + " minutes " + seconds + " seconds ";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 window.location = 'index.php';
}
    
}, 1000);

    </script>

<?php }?>

</div>  
        <footer id="footer" style=" ">
        <div class="copyright" style="background: #162e38; text-align: center; padding: 20px; border-radius: 5px; margin: 10px; margin-bottom: 30px; color: white;">
          <a style="font-size: 15px; font: caption; text-align: center;">&copy; 2021, Examiner. All rights reserved.</a>
        </div>
      </footer>




</body>
  <?php }?>


<?php  if($page === 2) {
  ?>
<body style="background: #124153;" >


        <div style=" margin-left: 10px; margin-right: 10px; background: #124153; text-align: left; background-image: url(./view/images/bgex.jpg); min-height: 200px; border-radius: 5px; padding: 15px;"  >
        <p style=" color: white; font: caption; font-size: 30px;"> Examiner</p>
          <p style=" color: white; font: caption;"> Name: <?php echo $_SESSION['username']; ?></br> Test: <?php echo $_SESSION['title']; ?></p>
  <p style="color: white;" >Time is over.</p>
        </div>
      


  
<div style="margin-left: 10px; margin-right: 10px; margin-top: 10px; padding-left: 15px; padding-right: 15px;  background: white; border-radius: 5px; font: caption;font-size: 13px; color: black; text-align: center;">
  
 


<div style=" width: auto; font-size: 13px; padding: 5px; background: #d6fff2; text-align: center; border-style: solid; padding-bottom: 40px; border-width: 1px; border-color: #42bbad;">

<?php
if (mysqli_num_rows($results->check_duplicate()) > 0) { 
 $errors['es'] = 'You already Enrolled once.';
} else {
            $answer = $results->has_no_solve();
            if(empty($answer)){ $errors['es'] = 'There are no Solutions. Teacher will provide you the marks.';}
            else {
            $counter = 0;
            $qnum = $_SESSION['qnum'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];
            $checked_count = 0;
            if($results->cal_result($answer)) { 
?>
<p style=" color: black; font: caption; border-width: 1px; border-color: black; margin-top: 20px; margin-left: 20px; font-size: 20px;">Hello <?php echo $_SESSION['username']; ?>,</br> In the exam <?php echo $_SESSION['title']; ?>, you have attempted <?php echo $checked_count; ?> out of <?php echo $_SESSION['qnum']; ?> question(s).</p>
<p style=" color: black; font: caption; border-width: 1px; border-color: black; margin-top: 20px; margin-left: 20px; font-size: 20px;">You have scored around <?php echo intval($counter*100/$qnum); ?>% marks.</br></br></br><span style="font-size: 30px; padding: 15px; border-radius: 4px; background: #42bbad; color: white; margin-top: 30px; margin-bottom: 30px; border-style: solid; border-width: 6px; border-color: white;"><?php echo $counter; ?></span></p>
<br>
<?php } else {$errors['es'] = "Database error1.";} } }
 if (count($errors) > 0): ?>
  <div style="background: red; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%; text-align: center;">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
  </br>
  </br>
<?php endif;


?>
<br>
<a href="index.php" style="margin-left: 20px; font: caption; font-size: 15px; border-style: solid; border-radius: 3px; border-color: #42bbad; color: #42bbad; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;" > Go Home </a>
</div>
</div>


        <footer id="footer">
        <div class="container">
          
        </div>
        <div class="copyright" style="background: #0c7f72; text-align: center; padding: 20px; border-radius: 5px; margin: 10px; margin-bottom: 30px; color: white;">
          <a style="font-size: 15px; font: caption; text-align: center;">&copy; 2021, Examiner. All rights reserved. Designed by Fz Arnob</a>
        </div>
      </footer>

</body>
  <?php }?>

</html>