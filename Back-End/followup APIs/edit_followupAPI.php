<?php
  session_start();
  //if(isset($_POST['followupedit'])) {

    $followup_id = $_POST['followup_id'];
    $answer_id = $_POST['answer_id'];
    //$user_id = $_SESSION['email']; 
    $date = time();
    $message = $_POST['message'];
<<<<<<< HEAD:Back-End/edit_followupAPI.php
    $connection = mysqli_connect("localhost", "root", "", "questiondb");
    $update_query = "UPDATE followup SET message='$message', post_date='$date'  WHERE followup_id='$followup_id'";
    $result = mysqli_query($connection, $update_query);
=======
    $connection = mysqli_connect("localhost", "root", "", "questiondb"); 
    $update_followupquery = "UPDATE followup SET message='$message', post_date='$date'  WHERE followup_id='$followup_id'";
    $result = mysqli_query($connection, $update_followupquery);
>>>>>>> 6fe657727d1b32846a190dd224fb5bb4bc6590d6:Back-End/followup APIs/edit_followupAPI.php
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
    }
    echo json_encode($json_array);
  //}
