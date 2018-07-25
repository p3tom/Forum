<?php
  session_start();
  //if(isset($_POST['editquestion'])) {

    $ques_id = $_POST['ques_id'];
    //$user_id = $_SESSION['email'];
    $date = time();
    $message = $_POST['message'];
    $connection = mysqli_connect("localhost", "root", "", "questiondb");
    if(!$connection){
        die("Connection failed:".mysqli_connect_error());
    }
    else{
      //var_dump($connection);
      $update_quesquery = "UPDATE question SET message='$message', post_date='$date'  WHERE ques_id= '$ques_id'";
      $result = mysqli_query($connection, $update_quesquery);

      $update_quesquery1 =  "SELECT * from question where ques_id = '$ques_id'";
      $result1 = mysqli_query($connection, $update_quesquery1);
      $json_array = array();
      //print_r($result1) ;
      while($row = mysqli_fetch_assoc($result1)){
        $json_array[] = $row;
      }
      echo json_encode($json_array);
      $question_Data = ['Question ID'=>$ques_id, 'Date'=>$date, 'Message'=> $message];
      $json = json_encode($question_Data);
    //  echo $json;
    }
  //}
