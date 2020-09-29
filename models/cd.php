<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql1 = "CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `number` varchar(100) NOT NULL,
 `dofb` varchar(100) NOT NULL,
 `institution` varchar(100) NOT NULL,
 `verified` tinyint(1) NOT NULL DEFAULT '0',
 `token` varchar(255) DEFAULT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`id`)
)";

$sql2 = "CREATE TABLE IF NOT EXISTS `exam` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `qsn` varchar(200) NOT NULL,
  `qnum` int(50) NOT NULL,
  `sdate` date NOT NULL,
  `sh` int(50) NOT NULL,
  `sm` int(50) NOT NULL,
  `ss` int(50) NOT NULL,
  `edate` date NOT NULL,
  `eh` int(50) NOT NULL,
  `em` int(50) NOT NULL,
  `es` int(50) NOT NULL,
  `ans` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
 )";
 $sql3 = "CREATE TABLE IF NOT EXISTS `result` (  
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `ex_title` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `atmp` int(50) NOT NULL,
  `score` int(50) NOT NULL,
  `qnum` int(50) NOT NULL,
  PRIMARY KEY (`id`)
 )";
 
if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>