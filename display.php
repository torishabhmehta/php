<?php
//start session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$username = $_SESSION["username"];
//connection variables
$db_host="192.168.121.187";
$db_user="first_year";
$db_pass="first_year";
$db="first_year_db";

//mysqli connection
$conn = new mysqli($db_host, $db_user, $db_pass,$db);

//check connection
if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
}

//enter query
$sql1= "select * from rishabh_bg where username='$username';";
$sql2= "select * from rishabh_profile where username='$username';";

//using query
$result1 = $conn->query($sql1);
if ($result1->num_rows == 1) {
    $row = $result1->fetch_assoc();
      $_SESSION["pp"] = $row["pn"];
        $_SESSION["cp"] = $row["cn"];
        $_SESSION["ei"] = $row["ei"];
        $_SESSION["work"] = $row["work"];
    $v=1; }

$result2 = $conn->query($sql2);
if ($result2->num_rows == 1) {
  $row = $result2->fetch_assoc();
  $_SESSION["name"] = $row["Name"];
  $_SESSION["email"] = $row["email"];
  $_SESSION["phno"] = $row["ph_no"];
  $_SESSION["age"] = $row["age"];
$v=$v+1;}

if($v==2)
{echo "successful";
header('location:php-assign/profile.php');}
else{
header('location:cprofile.html');}


echo $_SESSION["pp"];
?>
