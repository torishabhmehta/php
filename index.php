<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//variable naming
$name=$_POST["name"];
$age=$_POST["age"];
$username=$_POST["username"];
$phno=$_POST["phno"];
$email=$_POST["email"];
$passwd=$_POST["passwd"];
$x="/^[1-9]{1}[0-9]{0,2}$/";
$y="/^(\+91|0){0,1}(\s){0,1}[1-9]{1}[0-9]{4}(\-|\s){0,1}[0-9]{5}$/";

// mysql naming
$db_host="192.168.121.187";
$db_username="first_year";
$db_passwd="first_year";
$db_name="first_year_db";
$sql="INSERT INTO rishabh_profile VALUES ('$username', '$name', '$phno', '$passwd','$email','M',$age)";

// connection
$conn=new mysqli($db_host, $db_username, $db_passwd,"first_year_db" );
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);}

//validation
if (strlen($username)<32&&strlen($name)<64&&preg_match($x,$age)&&preg_match($y,$phno)&& filter_var($email, FILTER_VALIDATE_EMAIL))

  //insertion
{if($conn->query($sql)===TRUE)
  { echo "successful";}}
else
  {die("something wrong");}

?>

