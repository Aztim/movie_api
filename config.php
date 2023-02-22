<?php
error_reporting(0);
  $host = "localhost";
  $dbname = "auth-sys";
  $user = "root";
  $password = "";
 
  $conn = new PDO("mysql:host=$host;dbname=$dbname;",$user, $password);

  if($conn){
        echo "it's working fine";
      }else{
        echo "connection is wrong: err";
      }


?>