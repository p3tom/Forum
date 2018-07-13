<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'questiondb');
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}

if(isset($_POST['Submitdelete'])){
    $ques_id = $_POST['ques_id'];
    $sql = "DELETE FROM question WHERE ques_id='$ques_id'";
            $result = mysqli_query($conn, $sql);
            $json_array = array();
            while($row = mysqli_fetch_assoc($result)){
                $json_array[] = $row;
            }
                echo json_encode($json_array);
}
}
