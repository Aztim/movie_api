<?php
error_reporting(0);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "movies_api";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if(!$conn){
        // echo '{"message":"Unable to connect to database"}';
        die("Sorry we failed to connect:". mysqli_connect_error());
      }

  // echo "Connection was success"

?>