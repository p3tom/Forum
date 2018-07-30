<?php
  session_start();
  //if(isset($_POST['editquestion'])) {
    $ques_id = $message = '';
    $inputArray = [$ques_id, $message];
    $blank_fields = [];
    $is_filled = true;
    $ques_id = $_POST['ques_id'];
    //$user_id = $_SESSION['email'];
<<<<<<< HEAD
    $date = time();
=======
    //$date = time();
    $date = date('d-M-Y H:i:s', time());
>>>>>>> Forumbranch
    $message = $_POST['message'];
    foreach($inputArray as $row => $postRow){ #make array of inputs
      foreach($_POST as $postRow => $value){
        //echo not_filled($value);
        if (not_filled($value) === true) { #checks if each field is filled
          //$blank_fields[$postRow] = $postRow . " is required <br />";
          $blank_fields[$postRow] = $postRow;
          $is_filled = false;
          //echo '<br />' .implode($blank_fields);
        } #close if statement
      } #close inner foreach
    } #close outer foreach
    if (!empty($blank_fields)){
      echo implode(" is required. <br/>", $blank_fields). " is required.";
<<<<<<< HEAD
      echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/signup.html";</script>';
=======
      //echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/signup.html";</script>';
      echo '0';
>>>>>>> Forumbranch
    }
    if ($is_filled === true ) {
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
