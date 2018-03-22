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
$ei=htmlspecialchars($_POST["ei"]);
$work=htmlspecialchars($_POST["work"]);
$pn=$_FILES["pp"]["name"];
$cn=$_FILES["cp"]["name"];
$name=htmlspecialchars($_POST["name"]);
$email=htmlspecialchars($_POST["email"]);
$age=htmlspecialchars($_POST["age"]);
$phno=htmlspecialchars($_POST['phno']); 
$folder1="images/";
$folder2="images1/";
$file1=$folder1 . basename($_FILES["pp"]["name"]);
$file2=$folder2 . basename($_FILES["cp"]["name"]);
$imageFileType1 = strtolower(pathinfo($file1,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($file2,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["pp"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk1 = 1;
    } else {
        echo "File is not an image.";
        $uploadOk1 = 0;}
$check = getimagesize($_FILES["cp"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk2 = 1;
    } else {
        echo "File is not an image.";
        $uploadOk2 = 0;}

if (file_exists($file1)) {
    echo "<script>alert('Sorry, file already exists.')</script>";
    $uploadOk1 = 0;
header('location: php-assign/chprofile.php');
}

if (file_exists($file2)) {
    echo "<script>alert('Sorry, file already exists.')</script>";
    $uploadOk2 = 0;
header('location: php-assign/chprofile.php');}

if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk1 = 0;}

if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk2 = 0;}

if($uploadOk1!=0){
$sql="update rishabh_bg set pn='$pn' where username='$username'";
$conn->query($sql);
if (move_uploaded_file($_FILES["pp"]["tmp_name"], $file1)) {
          echo "The file ". basename( $_FILES["pp"]["name"]). " has been uploaded.";
              }} else {
                        echo "Sorry, there was an error uploading your file.";
                            }
if ($uploadOk2!=0){
$sql="update rishabh_bg set cn='$cn' where username='$username'";
$conn->query($sql);
if (move_uploaded_file($_FILES["cp"]["tmp_name"], $file2)) {
          echo "The file ". basename( $_FILES["cp"]["name"]). " has been uploaded.";
              }} else {
                        echo "Sorry, there was an error uploading your file.";
                            }
//query
$sql1="update rishabh_bg set ei='$ei', work='$work' where username='$username'; ";
$sql2="update rishabh_profile set Name='$name', email='$email', age='$age', ph_no='$phno' where username='$username';";

  //insertion
if($conn->query($sql1)===TRUE)
    { echo "successful";
    }
      else
        {die("something wrong");}

        if( $conn->query($sql2)===TRUE)
      { echo "successful";
            // header('location: display.php');
      }
                   else
                           {die("something wrong");}



        ?>

