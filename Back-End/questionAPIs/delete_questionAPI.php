<?php
session_start();

  //  if(isset($_POST['deletequestion'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
            $ques_id = $_POST['ques_id'];
            $sql = "DELETE FROM question WHERE ques_id='$ques_id'";
                $result = mysqli_query($connection, $sql);
                $json_array = array();
                
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                }
                    echo json_encode($json_array);
   // }
