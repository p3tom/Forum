<?php
  session_start();
  echo time();
  if(isset($_POST['Submitreply'])) {
    #reply_id auto incremented
    $ques_id = $_POST['ques_id']; #NOT SURE HOW TO RETRIEVE THIS
    $user_id = $_SESSION['email']; #retrieve user ID based on Login
    $date = time(); #timestamp
    $message = $_POST['message'];
    $connection = mysqli_connect("localhost", "root", "", "questiondb"); #adding user info to database
    $insert_query = "INSERT INTO reply SET ques_id = '$ques_id', user_id = '$user_id', date = '$date', message = '$message'";
    $query = mysqli_query($connection, $insert_query);

  }

?>
