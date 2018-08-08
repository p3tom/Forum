<?php
header("Access-Control-Allow-Origin: *");
 session_start();

    //if(isset($_POST['commentreply'])){
   // if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $answer_id = $_POST['answer_id'];
   if (empty($answer_id)) {
     echo "Answer ID is required. <br/>";
   }
   else{
            $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
            if(!$connection){
                die("Connection failed:".mysqli_connect_error());
            }
                $sql = "SELECT * FROM followup WHERE answer_id = $answer_id";
                $result = mysqli_query($connection, $sql);
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
  //}
?>
