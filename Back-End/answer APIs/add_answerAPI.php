<?php
  session_start();
  #Preethi's table code

  if(isset($_POST['replypost'])) {
      //answer_id auto incremented primary key
      $answer_id = $_POST['answer_id'];
      $ques_id = $_POST['ques_id']; #NOT SURE HOW TO RETRIEVE THIS  #it automatically create the value in question table
      //$user_id = $_SESSION['email']; #retrieve user ID based on Login
      //$user_id = $_SESSION['user_id'];
      $user_id = $_POST['user_id']; #Input user_id for testing purposes
      //echo $user_id;
      $date = date('d-M-Y H:i:s', time()); #timestamp
      $message = $_POST['message'];
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #adding user info to database
      //$insert_query = "INSERT INTO reply SET ques_id = '$ques_id', user_id = '$user_id', date = '$date', message = '$message'";
      $insert_query = "INSERT INTO answer SET user_id = '$user_id', post_date = '$date', message = '$message'";
      $query = mysqli_query($connection, $insert_query);
      //echo '<script> alert("Reply successfully posted"); location.href = "../Front-End/Question.html";</script>'; #
      $reply_Data = ['Answer ID' => $answer_id, 'Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
      //$json_array = array();
      $json = json_encode($replyData);
        echo $json;
  }


?>
