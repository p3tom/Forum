<?php
  session_start();

  //if(isset($_POST['questionpost'])){

      //$ques_id = $_POST['ques_id'];
      $user_id = $message = $ques_title = $score = '';
      $inputArray = [$user_id, $message, $ques_title, $score];
      $blank_fields = [];
      $is_filled = true;
      $user_id = $_POST['user_id'];
      //$date = date('d-M-Y H:i:s', time());  #timestamp
      $post_date = date('Y-m-d H:i:s', time());  #timestamp
      $message = $_POST['message'];
      $ques_title = $_POST['ques_title'];
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
          $insert_query = "INSERT INTO question SET user_id = '$user_id', post_date = '$post_date', message = '$message', ques_title = '$ques_title', score = '$score'"; #insert the data to database
          $query = mysqli_query($connection, $insert_query);
          //$question_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          //$question_Data = ['Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];

          //$question_Data = ['User ID'=>$user_id, 'Date'=>$date, 'Title'=> $title, 'Message'=> $message];
          //$json = json_encode($question_Data);
          // echo $json;
          $insert_query1 =  "SELECT * from question where post_date = '$post_date'";
          $result1 = mysqli_query($connection, $insert_query1);
          if (mysqli_num_rows($result1) == 1) { #make sure question has been deleted
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
    if (empty($input)) {
      return true; //input is not filled
    }
    else {
      return false; //input is filled
    }
  }
