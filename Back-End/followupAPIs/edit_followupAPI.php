<?php
header("Access-Control-Allow-Origin: *");
  session_start();
  //if(isset($_POST['followupedit'])) {
    $followup_id = $message = '';
    $inputArray = [$followup_id, $message];
    $blank_fields = [];
    $is_filled = true;

    $followup_id = $_POST['followup_id'];
    //$user_id = $_SESSION['email'];
    $post_date = date('Y-m-d H:i:s', time());  #timestamp
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
      echo '0';
    //  echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/Question.html";</script>';
    }
    if ($is_filled === true ) {
      $connection = mysqli_connect("localhost", "root", "", "questiondb");
      if(!$connection){
          die("Connection failed:".mysqli_connect_error());
      }
      else{
    $update_followupquery = "UPDATE followup SET message='$message', post_date='$post_date'  WHERE followup_id='$followup_id'";
    $result = mysqli_query($connection, $update_followupquery);

    $update_followupquery1 =  "SELECT * from followup where post_date = '$post_date'";
    $result1 = mysqli_query($connection, $update_followupquery1);
    if (mysqli_num_rows($result1) == 1) { #make sure question has been edited
      echo $json = '1';
      }
    else {
        echo '0';
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
