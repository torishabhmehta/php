<?php
session_start();
function login();
{
// server info
$server = '192.168.121.187';
$username = 'first_year';
$pass = 'first_year';
$db = 'first_year_db';

// connect to the database
$mysqli = new mysqli($server, $username, $password, $db);

//show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);}
login();

if(isset($_POST['submit']))
{
  $username = trim($_POST['username']);
  $password = trim($_POST['passwd']);
  $query = "SELECT username, password FROM rishabh_profile WHERE username='$username' 
    AND password='$password'";

  $result = mysqli_query($mysqli,$query)or die(mysqli_error());
  $num_row = mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  if( $num_row ==1 )
         {
            $_SESSION['username']=$row['username'];
             header("Location: admin.php");
              echo 'hi there';
               exit;
                 }
    else
           {
              echo 'oops  can not do it';
                }
     }
?>
