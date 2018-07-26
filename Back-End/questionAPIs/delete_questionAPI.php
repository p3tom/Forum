<?php
session_start();

  //  if(isset($_POST['deletequestion'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
              $ques_id = $_POST['ques_id'];
              if (empty($ques_id)) {
                echo "Question ID is required. <br/>";
                echo '0 <br/>';
              }
              else{
                $delete_query = "DELETE FROM question WHERE ques_id='$ques_id'";
                $result = mysqli_query($connection, $delete_query);

                $delete_query1 =  "SELECT * from question where ques_id = '$ques_id'";
                $result1 = mysqli_query($connection, $delete_query1);
                if (mysqli_num_rows($result1) == 0) { #make sure question has been deleted
                  //echo "Question deleted <br/>";
                  echo $json = '1';
                  }
                }

   // }
?>
