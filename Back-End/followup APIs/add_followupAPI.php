<?php
  session_start();

  if(isset($_POST['commentreply'])){

      $followup_id = $_POST['followup_id']; 
      $answer_id = $_POST['answer_id'];
      $user_id = $_POST['user_id']; 
      $date = date('d-M-Y H:i:s', time());  #timestamp
      $message = $_POST['message'];
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #to connect database
      $insert_query = "INSERT INTO followup SET followup_id = '$followup_id', answer_id = '$answer_id', user_id = '$user_id', post_date = '$date', message = '$message'"; #insert the data to database
      $query = mysqli_query($connection, $insert_query);
      $followup_Data = ['Followup ID'=> $followup_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
      $json = json_encode($followup_Data);
      echo $json;

    }
