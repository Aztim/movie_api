<?php
  header('Content-Type: application/json');
  require_once 'connection.php';

  $response = array();

  $stmt = $conn->prepare("SELECT * FROM movies");


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
    $stmt->close();
    
  }else{
    // we have an error
    $response['error'] = true;
    $response['message'] = "could not execute query";
  }

  echo json_encode($response);
?>