<?php
 session_start();
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ques_id = $_POST['ques_id'];
        if (empty($ques_id)) {
          echo "Question ID is required. <br/>";
        }
        else{
          $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
          if(!$connection){
              die("Connection failed:".mysqli_connect_error());
          }
              $select_query = "SELECT * FROM answer WHERE ques_id = '$ques_id'";
              $result = mysqli_query($connection, $select_query);
              if (mysqli_num_rows($result) == 0) {
                echo "No matches found";
                //echo '<script> alert("No matches found"); location.href = "../Front-End/Question.html";</script>';
              }
              else {
                $json_array = array();
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                }
                echo json_encode($json_array);
            }
          }
  //  }
