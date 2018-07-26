<?php
  session_start();
  //if(isset($_POST['followupedit'])) {
    $followup_id = $answer_id = $message = '';
    $inputArray = [$followup_id, $answer_id, $message];
    $blank_fields = [];
    $is_filled = true;

    $followup_id = $_POST['followup_id'];
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
    $update_followupquery = "UPDATE followup SET message='$message', post_date='$date'  WHERE followup_id='$followup_id'";
    $result = mysqli_query($connection, $update_followupquery);
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
    }
    echo json_encode($json_array);

    while($row = mysqli_fetch_assoc($result)){
      $json_array[] = $row;
      }
        echo json_encode($json_array);
        $$followup_Data = ['$followup ID'=>$answer_id, 'Date'=>$date, 'Message'=> $message];
        $json = json_encode($followup_Data);
      //  echo $json;
        echo $json = '1';
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

