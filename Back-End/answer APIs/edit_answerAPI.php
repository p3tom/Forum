<?php
  session_start();
  //if(isset($_POST['replypost'])) {
    $answer_id = $_POST['answer_id'];
    //$user_id = $_SESSION['email'];
    $date = time();
    $message = $_POST['message'];
<<<<<<< HEAD:Back-End/answer APIs/edit_answerAPI.php
    $connection = mysqli_connect("localhost", "root", "", "questiondb"); 
    $update_answerquery = "UPDATE answer SET message='$message', post_date='$date'  WHERE answer_id='$answer_id'";
    $result = mysqli_query($connection, $update_answerquery);
=======
    $connection = mysqli_connect("localhost", "root", "", "questiondb");
    $update_query = "UPDATE answer SET message='$message', post_date='$date'  WHERE answer_id='$answer_id'";
    $result = mysqli_query($connection, $update_query);
>>>>>>> 037edb202c798bf4096534dd8d08ad5e33417621:Back-End/edit_answerAPI.php
    $json_array = array();
    while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
    }
    echo json_encode($json_array);

  //}
