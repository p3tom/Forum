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
            }
            else{
              $delete_query = "DELETE FROM question WHERE ques_id='$ques_id'";
              $result = mysqli_query($connection, $delete_query);

              $delete_query1 =  "SELECT * from question where ques_id = '$ques_id'";
              $result1 = mysqli_query($connection, $delete_query1);

              else {
                  $json_array = array();
                  while($row = mysqli_fetch_assoc($result1)){
                      $json_array[] = $row;
                  }
                      echo json_encode($json_array);
                      echo "Question deleted";
              }
            }
   // }
?>
