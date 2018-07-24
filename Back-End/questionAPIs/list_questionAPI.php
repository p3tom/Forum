<?php
 session_start();

<<<<<<< HEAD:Back-End/question APIs/list_questionAPI.php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
=======

>>>>>>> 037edb202c798bf4096534dd8d08ad5e33417621:Back-End/list_questionAPI.php
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
