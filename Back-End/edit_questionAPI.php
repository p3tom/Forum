<?php
  session_start();
  if(isset($_POST['editquestion'])) {

    $ques_id = $_POST['ques_id']; 
    $user_id = $_SESSION['email']; 
    $date = time(); 
    $message = $_POST['message'];
    $connection = mysqli_connect("localhost", "root", "", "questiondb"); 
    $update_query = "UPDATE question SET message='$message', post_date='$date'  WHERE ques_id='$ques_id'";
    $result = mysqli_query($connection, $update_query);
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
    }
    echo json_encode($json_array);
  }


