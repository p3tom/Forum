<?php
  session_start();
  //if(isset($_POST['editquestion'])) {
    $ques_id = $message = $ques_title = '';
    $inputArray = [$ques_id, $message, $ques_title];
    $blank_fields = [];
    $is_filled = true;
    $ques_id = $_POST['ques_id'];
    //$user_id = $_SESSION['email'];
    $date = date('Y-m-d H:i:s', time());
    $message = $_POST['message'];
    $ques_title = $_POST['ques_title'];
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
        //var_dump($connection);
        $update_quesquery = "UPDATE question SET message='$message', post_date='$date', ques_title = '$ques_title'  WHERE ques_id= '$ques_id'";
        $result = mysqli_query($connection, $update_quesquery);

        $update_quesquery1 =  "SELECT * from question WHERE ques_id = '$ques_id' AND message = '$message' AND ques_title = '$ques_title'";
        $result1 = mysqli_query($connection, $update_quesquery1);
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
