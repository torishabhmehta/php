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
$folder="images/";
$file1=$folder . basename($_FILES["pp"]["name"]);
if (move_uploaded_file($_FILES["pp"]["tmp_name"], $file1)) {
          echo "The file ". basename( $_FILES["pp"]["name"]). " has been uploaded.";
              } else {
                        echo "Sorry, there was an error uploading your file.";
                            }
move_uploaded_file($_FILES[" cp "][" tmp_name "], $folder.$_FILES[" cp "][" name "]);
//query
$sql="INSERT INTO rishabh_bg VALUES('$user','$pn','$cn','$ei','$work');";
echo $pn;
  //insertion
if($conn->query($sql)===TRUE)
    { echo "successful";
     header('location: display.php');}
      else
        {die("something wrong");}


        ?>
