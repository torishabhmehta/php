<?php

session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');;

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
$user=$_SESSION["username"];
//upload variables
$username = $_SESSION["username"];
$ei=$_POST["ei"];
$work=$_POST["work"];
$pn=$_FILES["pp"]["name"];
$cn=$_FILES["cp"]["name"];
$name=$_POST["name"];
$email=$_POST["email"];
$age=$_POST["age"];
$phno=$_POST['phno']; 
$folder1="images/";
$folder2="images1/";
$file1=$folder1 . basename($_FILES["pp"]["name"]);
$file2=$folder2 . basename($_FILES["cp"]["name"]);

if (move_uploaded_file($_FILES["pp"]["tmp_name"], $file1)) {
          echo "The file ". basename( $_FILES["pp"]["name"]). " has been uploaded.";
              } else {
                        echo "Sorry, there was an error uploading your file.";
                            }
if (move_uploaded_file($_FILES["cp"]["tmp_name"], $file2)) {
          echo "The file ". basename( $_FILES["cp"]["name"]). " has been uploaded.";
              } else {
                        echo "Sorry, there was an error uploading your file.";
                            }
//query
$sql1="update rishabh_bg set ei="$ei", work="$work" where username="$username" ";
$sql2="update rishabh_bg set Name="$name", email="$email", age="$age" ph_no="$phno" where username="$username"";

  //insertion
if($conn->query($sql1)===TRUE&&$$conn->query($sql2)===TRUE)
    { echo "successful";
     header('location: display.php');}
      else
        {die("something wrong");}


        ?>

