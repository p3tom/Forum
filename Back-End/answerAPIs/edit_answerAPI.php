<?php
  session_start();
  //if(isset($_POST['replypost'])) {
    $answer_id = $message = '';
    $inputArray = [$answer_id, $message];
    $blank_fields = [];
    $is_filled = true;

    $answer_id = $_POST['answer_id'];
    //$user_id = $_SESSION['email'];
    $date = time();
    $message = $_POST['message'];
    foreach($inputArray as $row => $postRow){ #make array of inputs
      foreach($_POST as $postRow => $value){
        //echo not_filled($value);
        if (not_filled($value) === true) { #checks if each field is filled
          //$blank_fields[$postRow] = $postRow . " is required <br />";
          $blank_fields[$postRow] = $postRow;
          $is_filled = false;
          echo '0';
          //echo '<br />' .implode($blank_fields);
        } #close if statement
      } #close inner foreach
    } #close outer foreach
    if (!empty($blank_fields)){
      echo implode(" is required. <br/>", $blank_fields). " is required.";
    //  echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/Question.html";</script>';
    }
    if ($is_filled === true ) {
      $connection = mysqli_connect("localhost", "root", "", "questiondb");
      if(!$connection){
          die("Connection failed:".mysqli_connect_error());
      }
      else{
        $update_answerquery = "UPDATE answer SET message='$message', post_date='$date'  WHERE answer_id='$answer_id'";
        $result = mysqli_query($connection, $update_answerquery);
        $update_answerquery1 =  "SELECT * from answer where answer_id = '$answer_id' AND message = '$message'";
        $result1 = mysqli_query($connection, $update_answerquery1);
        /*
        $json_array = array();
        while($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
        }
          echo json_encode($json_array);
          $answer_Data = ['answer ID'=>$answer_id, 'Date'=>$date, 'Message'=> $message];
          $json = json_encode($answer_Data);
        //  echo $json;
        */
        if (mysqli_num_rows($result1) == 1) { #make sure question has been edited
          echo $json = '1';
          }
      }
    }

  //}
  function not_filled($input){
    if (empty($input)) {
      return true; //input is not filled
    }
    else {
      return false; //input is filled
    }
  }
