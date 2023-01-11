<?php
  header('Content-Type: application/json');
  require_once 'connection.php';

  $response = array();

  $stmt = $con->prepare("SELECT * FROM movies");


  if($stmt->execute()) {
    //statement was executed successfully
    $movies = array();
    //get all results from database
    $result = $stmt->get_result();

    //loop and get each single row
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $movies[] = $row;
    }

    $response['error'] = false;
    $response['movies'] = $movies;
    $response['message'] = "movies returned successfully";

  }else{
    // we have an error
  }
?>