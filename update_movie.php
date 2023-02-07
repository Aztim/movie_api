<?php 
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();

    if(isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars']) 
        && isset($_POST['box_office']) ){

        $id = $_POST['id'];
        $storyline = $_POST['storyline'];
        $stars = $_POST['stars'];
        $box_office = $_POST['box_office'];

        $stmt = $conn->prepare("UPDATE movies SET storyline='$storyline', stars='$stars', box_office='$box_office' WHERE id='$id' ");

        if($stmt->execute()){
            $response['error'] = false;
            $response['message'] = "Movie has been updated successfully";   
        
        } else {
            $response['error'] = true;
            $response['message'] = "failed to update movie";  
        }
        
        
    } else {
        //we dont have info to update the movie
        $response['error'] = true;
        $response['message'] = "Please provide us with id, storyline, box office and stars,";

    }

    echo json_encode($response);

?>