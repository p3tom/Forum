<?php
session_start();

  //  if(isset($_POST['deleteanswer'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
            $answer_id = $_POST['answer_id'];
            if (empty($answer_id)) {
              echo "Answer ID is required. <br/>";
              echo '0 <br/>';
            }
            else{
            $delete_query = "DELETE FROM answer WHERE answer_id='$answer_id'";
            $result = mysqli_query($connection, $delete_query);
            $delete_query1 =  "SELECT * from answer where answer_id = '$answer_id'";
            $result1 = mysqli_query($connection, $delete_query1);
            if (mysqli_num_rows($result1) == 0) { #make sure question has been deleted
              //echo "Answer deleted <br/>";
              echo $json = '1';
              }
            }
              //  }
