<?php include '../controllers/controller.php'?>
<!DOCTYPE html>
<html>
<head>
  
    <title>Examiner</title>
    <link rel="shortcut icon" href="../view/images/e.png" type="image/x-icon" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if($page === 0) { ?>
    <link rel="stylesheet" href="../view/assets/css/main.css" />
  </head>
<body style="background: #0a3653;">

<section id="main">
        <div class="inner">

        <!-- One -->
          <section id="one" class="wrapper style1">

            <div class="image fit flush">
              <img src="../view/images/pic02.jpg" alt="" />
            </div>
            <header class="special">
              <h2>Exam Scheduling</h2>
              <p style="color: #980121">Add Exam details and view results.</p>
              </br>
                  </br>
              
<?php if (count($sucess) > 0): ?>
  <div style="background: green; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%;">
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
  <div style="background: red; font: caption; color: white; padding: 15px; border-radius: 5px; width: 50%; margin-left: 25%;">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
  </br>
  </br>
<?php endif;?>




<form action="admin.php" method="post" class="ele_con" enctype="multipart/form-data" style="color: black;">

                <label style="color: black; font: caption;">Exam Title</label>
                  <input class="admin_ele" type="text" name="title" class="form-control form-control-lg">
                  </br>
                  </br>
                  <label style="color: black; font: caption;">Starting Time:</label>
                   Date <input class="admin_ele" type="date" name="sdate" >
                   </br>
                   Hours: <input class="admin_ele" type="number" name="sh" >
                  </br>
                  
                   Minutes:  <input class="admin_ele" type="number" name="sm" >
                   </br>
                   Seconds:  <input class="admin_ele" type="number" name="ss" >
                  </br>
                  </br>
                  <label style="color: black; font: caption;">Ending Time:</label>
                   Date  <input class="admin_ele" type="date" name="edate" >
                   </br>
                   Hours: <input class="admin_ele" type="number" name="eh" >
                  
                  </br>
                   Minutes:  <input class="admin_ele" type="number" name="em" >
                   </br>
                   Seconds:  <input class="admin_ele" type="number" name="es" >
                  </br>
                  </br>
                  <label style="color: black; font: caption;">Total Questions:</label>
                  </br>
                  <input class="admin_ele" type="number" name="qnum" class="form-control form-control-lg">
                  </br>
                  </br>
              <label style="color: black; font: caption;">Insert Question Image:</label>






    <input class="admin_ele" style="padding: 7px;" type="file" name="qsn" id="qsn">
    </br>
                  </br>
    <input style="color: white; background: #25a8b2; border-width: 0.5; border-color: #d7a23d; font: caption; border-radius: 5px; margin: auto;" type="submit" value="Schedule Exam" name="submit">
</form>
</header>
          </section>
        </div>
      </section>



<section id="main">

        <div class="inner">

          <!-- One -->
          <section id="two" class="wrapper style1">

            <header class="special">
              <h2>Scheduled Exams</h2>
              <p style="color: #980121">Remove or view Exam Status</p>
</br>
                  </br>
<div >

              <table>
  <tr style="background: #25a8b2; ">
    <th style="text-align: center; color: white;font: caption;padding-top: 10px;">Exam-Titles</th>
    <th style="text-align: center; color: white;font: caption;">Enroll-Key</th>
    <th style="text-align: center; color: white; font: caption;">Total-Qs</th>
  </tr>


<?php 
$sql = "SELECT id, title, qnum FROM exam";
$result = mysqli_query($conn, $sql);








if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>


  <tr style="background: #f6e7c9">
    <th style="text-align: center; color: black; font: caption; padding-top: 10px;"><?php echo $row["title"]?></th>
    <th style="text-align: center; color: black; font: caption; padding-top: 10px;"><?php echo $row["id"]?></th>
    <th style="text-align: center; color: black; font: caption; padding-top: 10px;"><?php echo $row["qnum"]?></th>
  </tr>
        <?php
    }
} else {
    echo "No Exam details to Show.";
}

?>




              </table>
              <form action="admin.php" method="post" class="ele_con" enctype="multipart/form-data">>
              <p style="color: #25a8b2;">Enrollment-Key</p>
              <input class="admin_ele" type="number" name="enroll">
            </br>
            </br>
              <input style=" color: white; background: #fe5353; border-width: 0.5; border-color: #d7a23d; font: caption; border-radius: 5px; " type="submit" value="Remove" name="del">
              </br>
              </br>
              <input style=" color: white; background: #66c87f; border-width: 0.5; border-color: #d7a23d; font: caption; border-radius: 5px; " type="submit" value="Add Solution" name="sol">
              </br>
            </form>
</div>



<h2>All Exam Results:</h2>
              <p style="color: #980121; font: caption; font-size: 10px;">Exam score table.</p>
              </br>
              </br>

<table>
  <tr style="background: #25a8b2; ">
    <th style="text-align: center; color: white;font: caption;padding-top: 10px;">Exam Titles</th>
    <th style="text-align: center; color: white;font: caption;">Name</th>
    <th style="text-align: center; color: white; font: caption;">Tried</th>
    <th style="text-align: center; color: white; font: caption;">Score</th>
  </tr>


<?php
$sql = "SELECT * FROM result";
$result = mysqli_query($conn, $sql);








if (mysqli_num_rows($result) > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
      ?>


  <tr style="background: #f6e7c9">
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["ex_title"]?></th>
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["User"]?></th>
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["atmp"]?></th>
    <th style="text-align: center;color: black;font: caption;padding-top: 10px;"><?php echo $row["score"]?></th>
  </tr>
        <?php
    }
} else { ?>
    <p style="color: black; font: caption;">No Exam yet.<p>
      </br>
              </br>
    <?php
    $conn->close(); 
}
?>




              </table>






            </header>
          </section>
        </div>
</section>
      



    <!-- Footer -->
      <footer id="footer">
        <div class="container">
          
        </div>
        <div class="copyright">
          &copy; Examiner. All rights reserved. Designed by Fz Arnob</a>
        </div>
      </footer>
</body>
<?php }?>


 <?php if($page === 1) {
  ?>
  
<body style="background: #124153;" >


        <div style=" margin-left: 10px; margin-right: 10px; background: #25a8b2; text-align: left; background-image: url(../view/images/bgex.jpg); min-height: 200px; border-radius: 5px; padding: 15px;"  >
        <p style=" color: white; font: caption; font-size: 30px;"> Examiner</p>
          <p style=" color: white; font: caption;"> Exam Title: <?php echo $title; ?></br> Total Questions: <?php echo $qnum; ?></p>
        </div>

        
      


  
<div style="margin-left: 10px; margin-right: 10px; padding-left: 15px; padding-right: 15px;  background: white; border-radius: 5px; font: caption;font-size: 13px; color: black; text-align: center;">
  
 


<div style=" width: auto; font-size: 13px; padding: 5px; background: #d6fff2; text-align: left; border-style: solid; padding-bottom: 40px; border-width: 1px; border-color: #42bbad;">

<form action="admin.php" method="post">
  
  
<p style="width: auto;">Choose correct Answer:</br>[one out of five options]
  </br>
  </br>
<?php
                     for($i=1;$i<$qnum+1;$i++){

                      $num = $i;
$num_p = sprintf("%02d", $num);
?>
<p style="display: inline-block; margin-left: 5px; margin-right: 5px; margin-bottom: 0px;"><span style="background: #42bbad; padding: 10px;">[ <span style="color: white;"><?php echo $num_p; ?></span> ]</span>
  <?php
                      foreach (range(A, E) as $op) {
                        ?>
                        <input id="a" type="radio" name="quizsolve[<?php echo $i; ?>]" id="<?php echo $i; ?>" value="<?php echo $op; ?>"  ><?php echo $op; ?>
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
<input style="font: caption; font-size: 15px; border-radius: 5px; border-style: solid; border-width: 1px; border-color: gray; padding: 4px; background: #42bbad; color: white;" type="submit" name="solve"  Value="Save Solution" /> <br>
                    </form>



                    <br>
                    <br>

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
<?php 


endif;?>
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
<br>
<br>
<a href="admin.php" style=" font: caption; font-size: 15px; border-style: solid; border-radius: 3px; border-color: #42bbad; color: #42bbad; padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;" > Go Home </a>
</div>

</body>

<?php } ?>
</html>


