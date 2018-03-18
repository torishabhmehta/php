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
$sql= "select pn,cn from rishabh_bg where username='$username';";

//using query
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
      $_SESSION["pp"] = $row["pn"];
        $_SESSION["cp"] = $row["cn"];
          
                header('location: php-assign/profile.php');
                      
}

echo $_SESSION["pp"];
?>
