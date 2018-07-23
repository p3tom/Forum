<?php
  session_start();
  //if(isset($_POST['editquestion'])) {

    $ques_id = $_POST['ques_id'];
    //$user_id = $_SESSION['email'];
    $date = time();
    $message = $_POST['message'];
<<<<<<< HEAD:Back-End/question APIs/edit_questionAPI.php
    $connection = mysqli_connect("localhost", "root", "", "questiondb"); 
    $update_quesquery = "UPDATE question SET message='$message', date='$date' WHERE ques_id='$ques_id'";
    $result = mysqli_query($connection, $update_quesquery);
=======
    $connection = mysqli_connect("localhost", "root", "", "questiondb");
    $update_query = "UPDATE question SET message='$message', post_date='$date'  WHERE ques_id='$ques_id'";
    $result = mysqli_query($connection, $update_query);
>>>>>>> 037edb202c798bf4096534dd8d08ad5e33417621:Back-End/edit_questionAPI.php
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
      $json_array[] = $row;
    }
    echo json_encode($json_array);
<<<<<<< HEAD:Back-End/question APIs/edit_questionAPI.php
  }
  


=======
  //}
>>>>>>> 037edb202c798bf4096534dd8d08ad5e33417621:Back-End/edit_questionAPI.php
