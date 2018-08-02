<?php
header("Access-Control-Allow-Origin: *");
 session_start();
   // if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
                $sql = "SELECT * FROM question";
                $result = mysqli_query($connection, $sql);
                $json_array = array();
              //var_dump( $result);
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                  //  echo $row;
                }
                echo json_encode($json_array);
       // }
?>
