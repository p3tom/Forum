<?php
header("Access-Control-Allow-Origin: *");
 //session_start();
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $list_answer = $list_followup = '';
        $ques_id = $_POST['ques_id'];
        $answer_id = $_POST['answer_id'];
        if (empty($ques_id)) {
          echo "Question ID is required. <br/>";
        }
        else{
          $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
          if(!$connection){
              die("Connection failed:".mysqli_connect_error());
          }
              $select_question = "SELECT * FROM question WHERE ques_id = '$ques_id'";
              $result1 = mysqli_query($connection, $select_question);
              if (mysqli_num_rows($result1) == 0) {
                echo "No matches found";
                //echo '<script> alert("No matches found"); location.href = "../Front-End/Question.html";</script>';
              }
              else {
                $json_array1 = array();
                while($row1 = mysqli_fetch_assoc($result1)){
                    $json_array1[] = $row1;
                }
                //echo json_encode(json_array1);
                $fp = fopen('results.json', 'w');
                fwrite($fp, json_encode($json_array1));
                fclose($fp);
            }
            #Select answers corresponding to ques_id
            $select_answers = "SELECT * FROM answer WHERE ques_id = '$ques_id'";
            $result2 = mysqli_query($connection, $select_answers);
            if (mysqli_num_rows($result2) == 0) {
              echo "No matches found";
              //echo '<script> alert("No matches found"); location.href = "../Front-End/Question.html";</script>';
            }
            else {
              $json_array2 = array();
              while($row2 = mysqli_fetch_assoc($result2)){ #save results as JSON array
                  $json_array2[] = $row2;
              }
              $inp = file_get_contents('results.json'); #append this data to existing JSON
              $tempArray = json_decode($inp);
              array_push($tempArray, $json_array2);
              $jsonData = json_encode($tempArray);
              file_put_contents('results.json', $jsonData);
              echo file_get_contents('results.json');
              //echo json_encode($json_array2);
          }
        }
?>
