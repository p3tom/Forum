<?php
session_start();

    if(isset($_POST['deleteanswer'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
            $answer_id = $_POST['answer_id'];
            $sql = "DELETE FROM answer WHERE answer_id='$answer_id'";
                $result = mysqli_query($connection, $sql);
                $json_array = array();
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                }
                    echo json_encode($json_array);
    }
