<?php
 session_start();
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $list_answer = '';
        $ques_id = $_POST['ques_id'];
        if (empty($ques_id)) {
          echo "Question ID is required. <br/>";
        }
        else{
          $connection = mysqli_connect('localhost', 'root', '', 'questiondb');
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
            $url = '../answerAPIs/list_answerAPI.php';

            //Add the input
            $postdata = http_build_query(
                array('ques_id' => $ques_id)
            );

             //$list_answer = callpostAPI($url, $postdata);
             $context = stream_context_create(array(
                 'http' => array(
                     'method' => 'POST',
                     'timeout' => 60,
                     'header'  => 'Content-type: application/x-www-form-urlencoded',
                     'content' => $postdata
                 )
               ));

               //GET the response inside $resp
               $list_answer = file_get_contents($url, FALSE, $context);
             //  echo $resp;
             var_dump($list_answer) ;

}
/*
function callpostAPI($url1, $postdata1){
  $context = stream_context_create(array(
      'http' => array(
          'method' => 'POST',
          'timeout' => 60,
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $postdata1
      )
    ));

    //GET the response inside $resp
    $resp = file_get_contents($url1, FALSE, $context);
  //  echo $resp;
    return $resp;
}
*/
?>
