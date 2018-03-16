<?php

//variable
$username=$_POST['urname'];

//run query
mysql_connect("192.168.121.187","first_year","first_year");
mysql_select_db("first_year_db");
if(isset($_POST['urname']))
{
   $username=$_POST['urname'];

   $checkdata=" SELECT username FROM rishabh_profile WHERE username='$username' ";

   $query=mysql_query($checkdata);

   if(mysql_num_rows($query)>0)
   {
     echo "Not OK";
   }
   else
   {
     echo "OK";
   }
   exit();
}
?>
