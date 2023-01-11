<?php

  // error_reporting(0);
  $conn = mysqli_connect('localhost', 'root', '', 'movies_api');

  if(!$conn){
    echo '{"message":"Unable to connect to database"}';
    die();
  }

?>