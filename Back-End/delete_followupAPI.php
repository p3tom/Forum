<?php
session_start();

  //  if(isset($_POST['followupdelete'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
            $followup_id = $_POST['followup_id'];
            $sql = "DELETE FROM followup WHERE followup_id='$followup_id'";
                $result = mysqli_query($connection, $sql);
                $json_array = array();
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                }
                    echo json_encode($json_array);
    //}
