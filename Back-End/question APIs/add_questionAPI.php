<?php
  session_start();

  //if(isset($_POST['questionpost'])){

      //$ques_id = $_POST['ques_id'];
      $user_id = $_POST['user_id'];
      $date = date('d-M-Y H:i:s', time());  #timestamp
      $message = $_POST['message'];
      $title = $_POST['title']; 
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #to connect database
      $insert_query = "INSERT INTO question SET user_id = '$user_id', post_date = '$date', message = '$message', $title ='title'"; #insert the data to database
      $query = mysqli_query($connection, $insert_query);
<<<<<<< HEAD:Back-End/question APIs/add_questionAPI.php
      $question_Data = ['Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
=======
      //$question_Data = ['Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
      $question_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Title'=> $title, 'Message'=> $message];
>>>>>>> 037edb202c798bf4096534dd8d08ad5e33417621:Back-End/add_questionAPI.php
      $json = json_encode($question_Data);
      echo $json;

  //  }
