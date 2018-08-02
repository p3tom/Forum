<?php
header("Access-Control-Allow-Origin: *");
  session_start();

//  if(isset($_POST['commentreply'])){

  $answer_id = $user_id = $message = $score = '';
  $inputArray = [$answer_id, $user_id, $message, $score];

  $blank_fields = [];
  $is_filled = true;

      $answer_id = $_POST['answer_id'];
      $user_id = $_POST['user_id'];
      $post_date = date('Y-m-d H:i:s', time());  #timestamp
      $message = $_POST['message'];
      //$score = $_POST['score'];
      $score = '0'; #default value for score = 0

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
          post_date = '$post_date', message = '$message', score = '$score'"; #insert the data to database
          $result = mysqli_query($connection, $insert_query);
          //$followup_Data = ['Followup ID'=> $followup_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          $insert_query1 =  "SELECT * from followup where post_date = '$post_date'";
          $result1 = mysqli_query($connection, $insert_query1);
          if (mysqli_num_rows($result1) == 1) { #make sure question has been inserted
            //echo "Question deleted <br/>";
            echo '1';
            }
          else {
            echo '0';
          }
        }
      }

  //  }

  function not_filled($input){
    if (is_null($input)) {
      return true; //input is not filled
    }
    else {
      return false; //input is filled
    }
  }
