<?php
header("Access-Control-Allow-Origin: *");
  session_start();
    //if(isset($_POST['replypost'])) {
      //answer_id auto incremented primary key
      //$answer_id = $_POST['answer_id'];
      $ques_id = $user_id = $message = $score = '';
      $inputArray = [$ques_id, $user_id, $message, $score];
      $blank_fields = [];
      $is_filled = true;
      $ques_id = $_POST['ques_id']; #NOT SURE HOW TO RETRIEVE THIS  #it automatically create the value in question table
      //$user_id = $_SESSION['email']; #retrieve user ID based on Login
      //$user_id = $_SESSION['user_id'];
      $user_id = $_POST['user_id']; #Input user_id for testing purposes
      //echo $user_id;
      $post_date = date('Y-m-d H:i:s', time()); #timestamp
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
        $connection = mysqli_connect("localhost", "root", "mysql", "questiondb"); #adding user info to database

        if(!$connection){
          die("Connection failed:".mysqli_connect_error());
        }
        else{
          $insert_query = "INSERT INTO answer SET ques_id = '$ques_id', user_id = '$user_id', post_date = '$post_date', message = '$message', score = '$score'";
          $query = mysqli_query($connection, $insert_query);
          //echo '<script> alert("Reply successfully posted"); location.href = "../Front-End/Question.html";</script>'; #
          //$reply_Data = ['Answer ID' => $answer_id, 'Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
        // $answer_Data = ['Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
          //$json_array = array();
         // $json = json_encode($answer_Data);
          // echo $json;
          $insert_query1 =  "SELECT * from answer where post_date = '$post_date'";
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

  //}


  function not_filled($input){
    if (is_null($input)) {
      return true; //input is not filled
    }
    else {
      return false; //input is filled
    }
  }

?>
