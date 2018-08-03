<?php
header("Access-Control-Allow-Origin: *");
 //session_start();
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
                $sql = "SELECT * FROM answer WHERE answer_id = $answer_id";
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
              //Add the URL
              $url1 = '../followupAPIs/list_followupAPI.php';

              //Add the input
              $postdata = http_build_query(
                  array('answer_id' => $answer_id)
              );

               $list_followup = callpostAPI($url1, $postdata);
               //  echo $resp;
               echo $list_followup;

  }
  if (!function_exists('callpostAPI')) {
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
}

  //}
?>
