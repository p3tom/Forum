<?php
 session_start();

<<<<<<< HEAD:Back-End/list_followupAPI.php
    //if(isset($_POST['commentreply'])){
=======
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
>>>>>>> 6fe657727d1b32846a190dd224fb5bb4bc6590d6:Back-End/followup APIs/list_followupAPI.php
            $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
                $sql = "SELECT * FROM followup";
                $result = mysqli_query($connection, $sql);
                $json_array = array();
                while($row = mysqli_fetch_assoc($result)){
                    $json_array[] = $row;
                }
                echo json_encode($json_array);
  //  }
