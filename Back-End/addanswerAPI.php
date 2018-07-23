<?php
  session_start();
  #Preethi's table code
/*
  $reply_table_query = "CREATE TABLE reply (
  	replyid int(11) not null AUTO_INCREMENT PRIMARY KEY,
      ques_id int NOT NULL,
      user_id varchar(128) not null,
      post_date datetime not null,
      message TEXT not null,
      FOREIGN KEY (id) REFERENCES question(id))
  )";

  $question_table_query = "CREATE TABLE question (
  	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,pp
  	user_id varchar(128) not null,
  	post_date datetime not null,
  	message TEXT NOT NULL,
  	replyid int NOT NULL )";
*/
  //if(isset($_POST['Submitreply'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //reply_id auto incremented primary key
      $ques_id = $_POST['ques_id']; #NOT SURE HOW TO RETRIEVE THIS
      //$user_id = $_SESSION['email']; #retrieve user ID based on Login
      //$user_id = $_SESSION['user_id'];
      $user_id = $_POST['user_id']; #Input user_id for testing purposes
      //echo $user_id;
      $date = date('d-M-Y H:i:s', time()); #timestamp
      $message = $_POST['message'];
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #adding user info to database
      $insert_query = "INSERT INTO reply SET user_id = '$user_id', post_date = '$date', message = '$message'";
      $query = mysqli_query($connection, $insert_query);

      $replyData = ['Question ID'=> $ques_id, 'User ID'=>$user_id, 'Date'=>$date, 'Message'=> $message];
      //$json_array = array();
      $json = json_encode($replyData);
        echo $json;
    }
  //}


?>
