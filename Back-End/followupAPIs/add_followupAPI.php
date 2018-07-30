<?php
  session_start();

//  if(isset($_POST['commentreply'])){

<<<<<<< HEAD
  $followup_id = $answer_id = $user_id = $message = '';
  $inputArray = [$answer_id, $user_id, $message];
=======
  $followup_id = $answer_id = $user_id = $message = $score = '';
  $inputArray = [$followup_id, $answer_id, $user_id, $message, $score];
>>>>>>> 7a6f7f1c775812bae2f01a0879341510a2d3c931
  $blank_fields = [];
  $is_filled = true;

      //$followup_id = $_POST['followup_id'];
      $answer_id = $_POST['answer_id'];
      $user_id = $_POST['user_id'];
      $date = date('Y-m-d H:i:s', time());  #timestamp
      $message = $_POST['message'];
      $score = $_POST['score'];

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
        //echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/Question.html";</script>';
      }

      if ($is_filled === true ) {
        $connection = mysqli_connect("localhost", "root", "", "questiondb"); #to connect database
        if(!$connection){
            die("Connection failed:".mysqli_connect_error());
        }
        else{
          //$insert_query = "INSERT INTO followup SET followup_id = '$followup_id', answer_id = '$answer_id', user_id = '$user_id',
          //post_date = '$date', message = '$message'"; #insert the data to database
          $insert_query = "INSERT INTO followup SET answer_id = '$answer_id', user_id = '$user_id',
          post_date = '$date', message = '$message', score = '$score'"; #insert the data to database
          $query = mysqli_query($connection, $insert_query);
          //$followup_Data = ['Followup ID'=> $followup_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          $followup_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          $insert_query = "INSERT INTO followup SET answer_id = '$answer_id', user_id = '$user_id', post_date = '$date', message = '$message'"; #insert the data to database
          $query = mysqli_query($connection, $insert_query);
          $followup_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          $json = json_encode($followup_Data);
        // echo $json;
          echo $json = '1';
        }
      }

  //  }

  function not_filled($input){
    if (empty($input)) {
      return true; //input is not filled
    }
    else {
      return false; //input is filled
    }
  }
