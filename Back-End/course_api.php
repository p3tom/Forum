<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$user_id=$_POST['user_id'];
$course_id=$_POST['course_id'];
$got_it=false;
$got_chapter=false;

//GET ALL THE DATA


$url = 'http://sci-code.com/Student_PlatformV1/demo/api.php/User/' . $user_id ;

$context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'timeout' => 60
    )
));

$resp = file_get_contents($url, FALSE, $context);

$course_list= json_decode(json_decode($resp, true)['course_list'], true);


$chapter_list= json_decode(json_decode($resp, true)['chapter_list'], true);

$exercise_list= json_decode(json_decode($resp, true)['exercise_list'], true);

$chapter_list_obj=array();

for($i=0;$i<count($course_list['course_list']);$i++)
{

	if($course_list['course_list'][$i]['id_course']==$course_id)
	{
		$got_it=true;
		$course_obj=$course_list['course_list'][$i];
	}
}





for($i=0;$i<count($chapter_list['chapter_list']);$i++)
{
	if($chapter_list['chapter_list'][$i]['id_course']==$course_id)
	{//echo $i;
		$chapter_obj=$chapter_list['chapter_list'][$i];

		$got_chapter=true;
		$exercise_obj=array();
		for($a=0;$a<count($exercise_list['exercise_list']);$a++)
		{
			if($exercise_list['exercise_list'][$a]['id_chapter']==$chapter_obj['id_chapter'])
			{//echo $a;
				array_push($exercise_obj,$exercise_list['exercise_list'][$a]);
				//$exercise_obj=$exercise_list['exercise_list'][$a];
				$chapter_obj["exercise_list"]=$exercise_obj;
				//var_dump($chapter_obj["exercise_list"]);

			}

		}

		array_push($chapter_list_obj,$chapter_obj);


	}

}



if($got_it){if($got_chapter){
	$course_obj['chapter_list']=$chapter_list_obj;



}

echo json_encode($course_obj);

}






if(!$got_it)//Message error
{
	echo "An error occured. The course_id is not a string or it is not found in the database.";
}

//echo "ca marche;:";
?>
