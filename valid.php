<?php
//start session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//variable declaration
$username=htmlspecialchars($_POST["username"]);
$passwd=md5($_POST["passwd"]);

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
if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
   {
     $hour = time() + 3600 * 24 * 30;
    setcookie('username', md5($username), $hour);
   }

if(isset($_COOKIE[$cookie_name])) {
  $md5=$_COOKIE['username'];
  $sql1="select username from rishabh_profile where md5='$md5';"
  $result = $conn->query($sql1);
  $row = $result->fetch_assoc();
  $_SESSION["username"] = $row["username"];

}


//enter query
$sql= "select * from rishabh_profile where username='$username' and password='$passwd';";

//using query
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  header('location: display.php');

} else {
        echo "<script>alert('Invalid username or password');
          window.location.href='php-assign/signin.html';</script>";
}



//closing connection
$conn->close();


?>

