<?php
  session_start();

//  if(isset($_POST['commentreply'])){

      //$followup_id = $_POST['followup_id'];
      $answer_id = $_POST['answer_id'];
      $user_id = $_POST['user_id'];
      $date = date('d-M-Y H:i:s', time());  #timestamp
      $message = $_POST['message'];
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #to connect database
<<<<<<< HEAD:Back-End/add_followupAPI.php
      //$insert_query = "INSERT INTO followup SET followup_id = '$followup_id', answer_id = '$answer_id', user_id = '$user_id',
      //post_date = '$date', message = '$message'"; #insert the data to database
      $insert_query = "INSERT INTO followup SET answer_id = '$answer_id', user_id = '$user_id',
       post_date = '$date', message = '$message'"; #insert the data to database
      $query = mysqli_query($connection, $insert_query);
      //$followup_Data = ['Followup ID'=> $followup_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
      $followup_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
=======
      $insert_query = "INSERT INTO followup SET followup_id = '$followup_id', answer_id = '$answer_id', user_id = '$user_id', post_date = '$date', message = '$message'"; #insert the data to database
      $query = mysqli_query($connection, $insert_query);
      $followup_Data = ['Followup ID'=> $followup_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
>>>>>>> 6fe657727d1b32846a190dd224fb5bb4bc6590d6:Back-End/followup APIs/add_followupAPI.php
      $json = json_encode($followup_Data);
      echo $json;

  //  }
