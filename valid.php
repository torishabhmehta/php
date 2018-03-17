<?php
//start session
session_start();

//variable declaration
$username=$_POST["username"];
$passwd=$_POST["passwd"];

$_SESSION["username"] = $username;
$_SESSION["passwd"] = $passwd;


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
$sql= "select * from rishabh_profile where username='$username' and password='$passwd';";

//using query
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $_SESSION["name"] = $row["Name"];
  $_SESSION["email"] = $row["email"];
  $_SESSION["phno"] = $row["ph_no"];
  $_SESSION["age"] = $row["age"];
        header('location: php-assign/profile.php');
              
} else {
        echo "NOT OK";
}



//closing connection
$conn->close();


?>

