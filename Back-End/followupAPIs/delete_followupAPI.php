<?php
session_start();

  //  if(isset($_POST['followupdelete'])){
        $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
            $followup_id = $_POST['followup_id'];
            if (empty($followup_id)) {
              echo "Follow-up ID is required. <br/>";
              echo '0 <br/>';
            }
            else{
            $delete_query = "DELETE FROM followup WHERE followup_id='$followup_id'";
            $result = mysqli_query($connection, $delete_query);
            $delete_query1 =  "SELECT * from followup where followup_id = '$followup_id'";
            $result1 = mysqli_query($connection, $delete_query1);
            if (mysqli_num_rows($result1) == 0) { #make sure question has been deleted
              //echo "Answer deleted <br/>";
              echo $json = '1';
              }
            }
//}
