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
          $connection = mysqli_connect('localhost', 'root', 'mysql', 'questiondb');
          if(!$connection){
              die("Connection failed:".mysqli_connect_error());
          }
              $select_query = "SELECT * FROM question WHERE ques_id = '$ques_id'";
              $result = mysqli_query($connection, $select_query);
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

            //Add the URL
            $url1 = '../answerAPIs/list_answerAPI.php';

            //Add the input
            $postdata1 = http_build_query(
                array('ques_id' => $ques_id)
            );

             $list_answer = callpostAPI($url1, $postdata1);

             //  echo $resp;
             //$list_answer = json_encode($list_answer);
             echo $list_answer;
/*
             //Add the URL
             $url2 = '../answerAPIs/individual_answerAPI.php';

             //Add the input
             $postdata2 = http_build_query(
                 array('answer_id' => $answer_id)
             );

              $list_followup = callpostAPI($url2, $postdata2);
              //  echo $resp;
              echo $list_followup;
*/

}
function callpostAPI($url, $postdata){
  $context = stream_context_create(array(
      'http' => array(
          'method' => 'POST',
          'timeout' => 60,
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $postdata
      )
    ));

    //GET the response inside $resp
    //$resp = file_get_contents($url1, FALSE, $context);
    $resp = get_include_contents($url);
  //  echo $resp;
    return $resp;
}

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

?>
