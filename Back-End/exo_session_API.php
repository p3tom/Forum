<?php
session_start();
header("Access-Control-Allow-Origin: *");

$chapter_id=$_SESSION['section'];
$exercise_id=$_POST['exercise_id'];
$course_id=$_SESSION['course'];
$user_id=$_SESSION['user'];

$history_exo=$_SESSION['history_exo'];



$_SESSION['exercise_id']=$exercise_id;

$_SESSION['exercise_time']=time();


//Add the URL
$url = 'http://sci-code.com/Student_PlatformV1/demo/user_verification_exo.php';

//Add the input
	$postdata = http_build_query(
    array(
		
        
        'chapter_id' => $chapter_id,
        'user_id' => $user_id,
        'exercise_id' => $exercise_id
  
    )
);

//Method of the request
$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'timeout' => 60,
		'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
));
	
	//GET the response inside $resp
	$resp = file_get_contents($url, FALSE, $context);
	
	echo $resp;

	



?>