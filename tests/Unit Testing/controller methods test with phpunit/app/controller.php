<?php
error_reporting(0);
// if(file_exists('../models/model.php')){
// require_once '../models/model.php';
// } else {
// require_once './models/model.php';
// }
session_start();
$username = "";
$email = "";
$errors = [];
$page = 0;
$sucess = [];
$title="";
$qsn = "";
$qnum="";
$sdate = "";
$sh = "";
$sm = "";
$ss = "";
$edate = "";
$eh = "";
$em = "";
$es = "";
$wait = 0;
$key = 0;
// $model = new model();
// $conn = $model->connect();

// Data Passed by the users go here
$_POST['username'] = "FarhanZaman";
$_POST['email']= "farhanzamanarnob@gmail.com";
$_POST['password']= "123";
$_POST['number']= "1521581368";
$_POST['DofB']= "1996-02-07";
$_POST['institution']= "BRACU";
$_POST['password']= "123";
$_POST['passwordConf']= "123";
// Data Passed by the users taking exam go here
$_POST['enroll'] = 1;
$_POST['quizsolve'] = array('A','A','A','A','A','A','A','A','A','A');
$_POST['enroll-key'] = 1;

$_POST['title'] = "FakeExam";
$_FILES["qsn"]["name"] = "./app/FakeExam.png";
$_POST['qnum'] = 10;
$_POST['sdate'] = "2020-10-27";
$_POST['sh'] = 13;
$_POST['sm'] = 1;
$_POST['ss'] = 1;
$_POST['edate'] = "2020-10-27";
$_POST['eh'] = 14;
$_POST['em'] = 1;
$_POST['es'] = 1;

// Data Passed by the user's result go here
$_POST['quizcheck'] = array('A','A','A','A','A','A','A','A','A','A');




class user{
public function login_user(){
if (empty($_POST['email'])) {
$GLOBALS['errors']['email'] = 'Email required';
}
if (empty($_POST['password'])) {
$GLOBALS['errors']['password'] = 'Password required';
}
$email = $_POST['email'];
$password = $_POST['password'];
if (count($GLOBALS['errors']) === 0) {

    //Fake data to mock DataBase
$user = array(
    "id" => "1",
    "username" => "FarhanZaman",
    "email" => "farhanzamanarnob@gmail.com",
    "number" => "1521581368",
    "dofb" => "1996-02-07",
    "institution" => "BRACU",
    "verified" => false,
    "password" => '$2y$10$uAfxj2ebk9V/zcPFcbDI/OavBdRGoMPZpbBbXWOYCQ5AvQjxti0Hy',
);


if (password_verify($password, $user['password'])) { // if password matches
$_SESSION['id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['email'] = $user['email'];
$_SESSION['number'] = $user['number'];
$_SESSION['DofB'] = $user['dofb'];
$_SESSION['institution'] = $user['institution'];
$_SESSION['verified'] = $user['verified'];
$_SESSION['message'] = 'You are logged in!';
$_SESSION['type'] = 'alert-success';
return true;
// header('location: ../index.php');
// exit(0);
} else { // if password does not match
$GLOBALS['errors']['login_fail'] = "Wrong Email / password";
return false;
}
}
}
public function signup_user(){
if (empty($_POST['username'])) {
$GLOBALS['errors']['username'] = 'Username required';
}
if (empty($_POST['email'])) {
$GLOBALS['errors']['email'] = 'Email required';
}
if (empty($_POST['number'])) {
$GLOBALS['errors']['number'] = 'Contact required';
}
if (empty($_POST['DofB'])) {
$GLOBALS['errors']['DofB'] = 'Date of Brith required';
}
if (empty($_POST['institution'])) {
$GLOBALS['errors']['institution'] = 'Institution name required';
}
if (empty($_POST['password'])) {
$GLOBALS['errors']['password'] = 'Password required';
}
if (empty($_POST['passwordConf']) && $_POST['password'] !== $_POST['passwordConf']) {
$GLOBALS['errors']['passwordConf'] = 'The two passwords do not match';
}
$username = $_POST['username'];
$email = $_POST['email'];
$number = $_POST['number'];
$DofB = $_POST['DofB'];
$institution = $_POST['institution'];
$token = bin2hex(random_bytes(50)); // generate unique token
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
// Check if email already exists
// $result = $GLOBALS['model']->select("users", "email='".$email."'");;
// MOCK
$mysqli_num_rows = 0;
if ($mysqli_num_rows > 0) {
$GLOBALS['errors']['email'] = "Email already exists";
}
if (count($GLOBALS['errors']) === 0) {
// $result = $GLOBALS['model']->insert("users", "username='$username', email='$email', number='$number', dofb='$DofB', institution='$institution', token='$token', password='$password'");
// mocking DB result
$result = true;
if ($result) {
$_SESSION['id'] = 0;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['number'] = $number;
$_SESSION['DofB'] = $DofB;
$_SESSION['institution'] = $institution;
$_SESSION['verified'] = false;
$_SESSION['message'] = 'You are logged in!';
$_SESSION['type'] = 'alert-success';
// header('location: ../index.php');
return true;
} else {
$_SESSION['error_msg'] = "Database error: Could not register user";
}
}
return false;
}
public function logout_user(){
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['number']);
unset($_SESSION['DofB']);
unset($_SESSION['institution']);
unset($_SESSION['verifiedr']);
unset($_SESSION['message']);
unset($_SESSION['type']);
// header("location: ./view/login.php");
return true;
}
}
class exam{
public function save_solution(){
$GLOBALS['title'] = $_SESSION['ext'];
$GLOBALS['qnum']  = $_SESSION['tq'];
if(!empty($_POST['quizsolve'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['quizsolve']);
// print_r($_POST);
if(strval($checked_count) === $GLOBALS['qnum']){ 
$answer = $_POST['quizsolve'];
$anstring = "";
for($i=1;$i<$GLOBALS['qnum']+1;$i++){
$anstring = $anstring. $answer[$i];
}
// if($GLOBALS['model']->update("exam", "ans='".$anstring."'", "title='".$GLOBALS['title']."'")){
// mocking DB result is true
$result = true;
if($result){
$GLOBALS['sucess']['s1']= "Solution is recorded.";}
return true;
// else {
// $GLOBALS['errors']['s1'] = "Database error.";
// }
}
else{
$GLOBALS['errors']['s1'] = "All answers are not selected2";
}
} else { $GLOBALS['errors']['s1'] = "All answers are not selected1";}
$GLOBALS['page'] =1;
return false;
}
public function add_solution(){
if (empty($_POST['enroll'])) {
$GLOBALS['errors']['es'] = 'Enrollment-Key required.';
}
if (count($GLOBALS['errors']) === 0) {
$_SESSION['exam_id'] = $enrollkey = $_POST['enroll'];
//Fake data to mock DataBase
$res = array(
    "title" => "FakeExam",
    "qnum" => "10",
);
$row_exist=true;
while($row_exist) { 
$_SESSION['ext']  = $GLOBALS['title'] = $res['title'];
$_SESSION['tq'] = $GLOBALS['qnum'] = $res['qnum'];
$row_exist=false;
}
$GLOBALS['page'] =1;
return true;
}
return false;
}
public function delete_exam(){
$enroll = $_POST['enroll'];
// $qsnf = $GLOBALS['model']->select("exam", "id='".$enroll."'");
$mysqli_num_rows = 1;
if ($mysqli_num_rows > 0) {
// output data of each row
$row_exist = true;
$row = array(
    "title" => "FakeExam",
    "qnum" => "10",
    "qsn" => "FakeExam.png",
);
while($row_exist) {
$qw = $row["qsn"];
$row_exist = false;
}
$path = "Questions/". $qw;
// if (unlink($path)){ // mock file delete
if (true){
//$res = $GLOBALS['model']->delete("exam", "id='".$enroll."'"); // mock DB result
$res = true;
if($res){
$GLOBALS['sucess']['es'] = 'Exam Removed from our Database';
return true;
} else{
$GLOBALS['errors']['es'] = "Some errors occured";
} 
return false;  
}
else{
$GLOBALS['errors']['es'] = "Some errors occured";
}     
}
return false;
}
public function enroll_exam(){
$GLOBALS['key'] = $enrollkey = $_POST['enroll-key'];
// $result = $GLOBALS['model']->select("exam", "id='".$enrollkey."'");
$res = array(
    "title" => "FakeExam",
    "qnum" => "10",
    "qsn" => "FakeExam.png",
    "sdate" => "2020-10-27",
    "sh" => 13,
    "sm" => 1,
    "ss" => 1,
    "edate" => "2020-10-27",
    "eh" => 14,
    "em" => 1,
    "es" => 1,
);
$row_exist = true;
while($row_exist) { 
$_SESSION['title'] = $GLOBALS['title'] = $res['title'];
$_SESSION['qsn'] = $GLOBALS['qsn'] = $res['qsn'];
$_SESSION['qnum'] = $GLOBALS['qnum'] = $res['qnum'];
$_SESSION['sdate'] = $GLOBALS['sdate'] = $res['sdate'];
$_SESSION['sh'] = $GLOBALS['sh'] = $res['sh'];
$_SESSION['sm'] = $GLOBALS['sm'] = $res['sm'];
$_SESSION['ss'] = $GLOBALS['ss'] = $res['ss'];
$_SESSION['edate'] = $GLOBALS['edate'] = $res['edate'];
$_SESSION['eh'] = $GLOBALS['eh'] = $res['eh'];
$_SESSION['em'] = $GLOBALS['em'] = $res['em'];
$_SESSION['es'] = $GLOBALS['es'] = $res['es'];
$row_exist = false;
}
$GLOBALS['email'] = $_SESSION['email'];
// $result = $GLOBALS['model']->select("result", "u_email='".$GLOBALS['email']."' AND ex_title='".$GLOBALS['title']."'");
$mysqli_num_rows = 0;
if ($mysqli_num_rows > 0) { 
$GLOBALS['errors']['es'] = 'You already Enrolled once.';
}
if (empty($_POST['enroll-key'])) {
$GLOBALS['errors']['es'] = 'Enrollment-Key required.';
}
if (count($GLOBALS['errors']) === 0) {
$st= strtotime($GLOBALS['sdate']." ".$GLOBALS['sh'].":".$GLOBALS['sm'].":".$GLOBALS['ss']) * 1000;
$et= strtotime($GLOBALS['edate']." ".$GLOBALS['eh'].":".$GLOBALS['em'].":".$GLOBALS['es']) * 1000;
$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
$nt= strtotime($dt->format('F j, Y, g:i:s a')) * 1000;
$distance = $st - $nt;
$distance1 = $et - $nt;
// Update the count down every 1 second
if ($distance1 < 0){
$GLOBALS['errors']['es'] = $GLOBALS['title'] . " exam has already finished";
}
if ($distance > 0 ){
$GLOBALS['wait'] =1;
}
if ($distance < 0 && $distance1 > 0){
$GLOBALS['page'] = 1;
}
return true;
}
return false;
}

public function add_exam(){
if (empty($_POST['title']) || empty($_POST['qnum']) || empty($_FILES["qsn"]["name"]) || empty($_POST['sdate']) || empty($_POST['sh']) || empty($_POST['sm']) || empty($_POST['ss']) || empty($_POST['edate']) || empty($_POST['eh']) || empty($_POST['em']) || empty($_POST['es'])) {
if($_POST['sh'] === '0' || $_POST['sm'] === '0' ||$_POST['ss'] === '0' || $_POST['eh'] === '0' || $_POST['em'] === '0' ||$_POST['es'] === '0'){}
else{
$GLOBALS['errors']['es'] = 'One or more information is empty';
}
}
$GLOBALS['title'] = $_POST['title'];
$GLOBALS['qsn'] = $_FILES["qsn"]["name"];
$GLOBALS['qnum'] = $_POST['qnum'];
$GLOBALS['sdate'] = $_POST['sdate'];
$GLOBALS['sh'] = $_POST['sh'];
$GLOBALS['sm'] = $_POST['sm'];
$GLOBALS['ss'] = $_POST['ss'];
$GLOBALS['edate'] =$_POST['edate'];
$GLOBALS['eh'] = $_POST['eh'];
$GLOBALS['em'] = $_POST['em'];
$GLOBALS['es'] = $_POST['es'];
// $result = $GLOBALS['model']->select("exam", "title='".$GLOBALS['title']."'");
if (0 > 0) {
$GLOBALS['errors']['es0'] = "Exam with same title already exists";
}
$st= strtotime($GLOBALS['sdate']." ".$GLOBALS['sh'].":".$GLOBALS['sm'].":".$GLOBALS['ss']) * 1000;
$et= strtotime($GLOBALS['edate']." ".$GLOBALS['eh'].":".$GLOBALS['em'].":".$GLOBALS['es']) * 1000;
$d = $et - $st;
if($d<0) {
$GLOBALS['errors']['es0'] = "Start time should be earlier than end time.";
}
$target_dir = "Questions/";
$target_file = $target_dir . basename($_FILES["qsn"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// $check = getimagesize($_FILES["qsn"]["tmp_name"]);
// if($check !== false) {
// } else {
// $GLOBALS['errors']['es1'] = "File is not an image.";
// }
// Check if file already exists
// if (file_exists($target_file)) {
// $GLOBALS['errors']['es2'] = "Same file already exists.";
// }
// Check file size
// if ($_FILES["qsn"]["size"] > 2097152) {
// $GLOBALS['errors']['es3'] = "Your file is too large, more than 2MB.";
// }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
$GLOBALS['errors']['es4'] = "Only JPG, JPEG, PNG & GIF files are allowed.";
}
// Check if $uploadOk is set to 0 by an error
if (count($GLOBALS['errors']) === 0) {
// $result = $GLOBALS['model']->insert("exam", "title='".$GLOBALS['title']."', qsn='".$GLOBALS['qsn']."', qnum=".$GLOBALS['qnum'].", sdate='".$GLOBALS['sdate']."', sh=".$GLOBALS['sh'].", sm=".$GLOBALS['sm'].", ss=".$GLOBALS['ss'].", edate='".$GLOBALS['edate']."', eh=".$GLOBALS['eh'].", em=".$GLOBALS['em'].", es=".$GLOBALS['es'].", ans=''");
$result = true;
if ($result) {
if (true) {
$GLOBALS['sucess']['es'] = 'Exam added to our Database';
return true;
} else {
$GLOBALS['model']->delete("exam", "title='".$GLOBALS['title']."'");
$GLOBALS['errors']['es'] = "Sorry, there was an error uploading your file.";
} 
} else {$GLOBALS['errors']['es'] = "Database Error."; }
} 
return false;
}
}
class result{
public function check_duplicate(){
$GLOBALS['email'] = $_SESSION['email'];
$GLOBALS['title'] = $_SESSION['title'];
$result = true;
// $result = $GLOBALS['model']->select("result", "u_email='".$GLOBALS['email']."' AND ex_title='".$GLOBALS['title']."'");
return $result;
}
public function has_no_solve(){
$answer="";
$GLOBALS['title'] = $_SESSION['title'];
// $ansresults = $GLOBALS['model']->select("exam", "title='".$GLOBALS['title']."'");
$row_exist = true;
$rows = array('ans' => 'AAAAAAAAAA', );
while($row_exist) {
$answer = $rows['ans'];
$row_exist = false;
}
return $answer;
}
public function cal_result($answer){
$GLOBALS['counter'] = 0;
$GLOBALS['qnum'] = $_SESSION['qnum'];
$GLOBALS['username'] = $_SESSION['username'];
$GLOBALS['email'] = $_SESSION['email'];
$GLOBALS['title'] = $_SESSION['title'];
$GLOBALS['checked_count'] = 0;
if(!empty($_POST['quizcheck'])) {
// Counting number of checked checkboxes.
$GLOBALS['checked_count'] = count($_POST['quizcheck']);
$selected = $_POST['quizcheck'];
$ansc = str_split($answer);
for($i=0;$i<$GLOBALS['qnum'];$i++){
if($ansc[$i] === $selected[$i+1]){ $GLOBALS['counter'] = $GLOBALS['counter'] + 1;}
}
}
// $result = $GLOBALS['model']->insert("result", "ex_title='".$GLOBALS['title']."', User='".$GLOBALS['username']."', u_email='".$GLOBALS['email']."', atmp=".$GLOBALS['checked_count'].", score=".$GLOBALS['counter'].", qnum=".$GLOBALS['qnum']);
$result = true;
return $result;
}
}
// $results = new result();
// $user = new user();
// $exam = new exam();
// if (isset($_POST['solve'])) {
// $exam->save_solution();
// }
// if (isset($_POST['sol'])) {
// $exam->add_solution();
// }
// if (isset($_POST['check'])) {
// $page = 2;
// }
// if(isset($_POST["del"])) {
// $exam->delete_exam();
// }
// if (isset($_POST['enrolled'])) {
// $exam->enroll_exam();
// }
// // SIGN UP USER
// if (isset($_POST['signup-btn'])) {
// $user->signup_user();
// }
// // LOGIN
// if (isset($_POST['login-btn'])) {
// $user->login_user();
// }
// // LOGOUT
// if (isset($_POST['logout-btn'])) {
// $user->logout_user();
// }
// if(isset($_POST["submit"])) {
// $exam->add_exam();
// }
?>
