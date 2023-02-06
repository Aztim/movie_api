<?php
    header('Content-Type: application/json');
    require_once 'connection.php';
  
    $response = array();

    if(isset($_GET['title'])){
        $title = $_GET['title'];
        
        $stmt = $conn->prepare("SELECT id, title, lang, genre, release_date, box_office, run_time, stars 
            FROM movies WHERE title = ? ");
        $stmt->bind_param("s",$title);
        
        if($stmt->execute()){
            //success
            $stmt->bind_result($id,$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);
            $stmt->fetch();

            $movie = array(
                'id'=>$id,
                'title'=>$title,
                'storyline'=>$storyline,
                'lang'=>$lang,
                'genre'=>$genre,
                'release_date'=>$release_date,
                'box_office'=>$box_office,
                'run_time'=>$run_time,
                'stars'=>$stars

            );
        

                $response['error'] = false;
                $response['movie'] = $movie;
                $response['message'] = "movie has been returned successfully";

        }else{
            //failure
            $response['error']=true;
            $response['message']="we could not get the movie";
        }
        

    }else{
        // no movie title was provided, we cannot get the movie  

        $response['error']=true;
        $response['message']="Please provide a movie title";

    }
    echo json_encode($response);
?>