<?php
header("Access-Control-Allow-Origin: *");
 //session_start();
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //global $answer_id;



        $question = $answer_list = $followup_list = $answer_id = '';
        #Choose question
        $ques_id = $_POST['ques_id'];
        //$answer_id = $_POST['answer_id'];
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
                echo "No matches found <br/>";
                echo '0';
                //echo '<script> alert("No matches found"); location.href = "../Front-End/Question.html";</script>';
              }
              else {
                //$got_it = true; #verified that ques_id exists
                $question = array();
                while($row = mysqli_fetch_assoc($result)){
                    $question[] = $row;
                }
              //  $question_obj = array();
                $question_obj = $question[0];

            $answer_list_obj = array();
            //Add the URL
            $url1 = '../answerAPIs/list_answerAPI.php';
            //Add the input
            $postdata1 = http_build_query(
                array('ques_id' => $ques_id)
            );
            #ANSWERS
            #call list_answerAPI which outputs all answers with given ques_id
             $answer_list = callpostAPI($url1, $postdata1);
             $answer_list_obj = json_decode($answer_list, true); #save list of answers to answer object
             //var_dump($answer_obj);
             $question_obj['answer_list']=$answer_list_obj;
             //var_dump($question_obj);
          //   echo json_encode($question_obj);

             #FOLLOWUPS
             #for each answer corresponding to ques_id, output followups using list_followupAPI
            #call list_followupAPI which outputs all followups with given answer_id
            //Add the URL
            $url2 = 'http://localhost:1234/scicode/Forum/Back-End/followupAPIs/list_followupAPI.php';
            //Add the input
            // $postdata2 = http_build_query(
            //   array('answer_id' => $answer_id)
            // );
            $followup_list_obj = array();;

            for($i=0;$i<count($question_obj['answer_list']);$i++) {


                  $answer_id = $question_obj['answer_list'][$i]['answer_id'];
                //  echo $answer_id . '<br/>';//Add the input
                  $postdata2 = http_build_query(
                    array('answer_id' => $answer_id)
                  );
                //  $followup_list = callpostAPI($url2, $postdata2);
                    //echo $postdata2;
                  //getting data from followups
                  $context = stream_context_create(array(
                      'http' => array(
                          'method' => 'POST',
                          'timeout' => 60,
                          'header'  => 'Content-type: application/x-www-form-urlencoded',
                          'content' => $postdata2
                      )
                    ));

                    //GET the response inside $resp
                    $resp = json_decode(file_get_contents($url2, FALSE, $context),true);
                  //  $resp = get_include_contents($url2);
                  //  var_dump($resp) ;


                      $question_obj['answer_list'][$i]['followup_list']=$resp;





//$followup_list_obj = json_decode($followup_list, true); #save list of followups to followup object
                  //var_dump($postdata2);
                  //$answer_obj['followup_list'] = $followup_list_obj;
                }


            /*for($i = 0; $i<count($question_obj['answer_list']); $i++){
              if ($question_obj['answer_list'][$i])
              $followup_list = callpostAPI($url2, $postdata2);
              $followup_obj = json_decode($followup_list, true); #save list of answers to followup object
              //var_dump($followup_obj);
              $followup_list_obj = $followup_obj;
              $answer_obj['followup_list'] = $followup_list_obj;
            }*/
            //$question_obj['answer_list']=$answer_list_obj;
            //echo json_encode($answer_obj);

       echo json_encode($question_obj);
     }
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
