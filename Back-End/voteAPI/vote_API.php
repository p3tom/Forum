<?php 
// connect to database
$connection = mysqli_connect('localhost', 'root', 'mysql', 'questiondb');

// lets assume a user is logged in with id $user_id
$user_id = $_POST['user_id'];


if(!$connection){
    die("Connection failed:".mysqli_connect_error());
}

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $vote_id = $_POST['vote_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO rating_info (user_id, vote_id, rating_action) 
         	   VALUES ($user_id, $vote_id, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO rating_info (user_id, vote_id, rating_action) 
               VALUES ($user_id, $vote_id, 'dislike') 
         	   ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
  	default:
      break;
    case 'unlike':
	      $sql="DELETE FROM rating_info WHERE user_id=$user_id AND vote_id=$vote_id";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM rating_info WHERE user_id=$user_id AND vote_id=$vote_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($connection, $sql);
  echo getRating($vote_id);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $connection;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE vote_id = $id AND rating_action='like'";
  $rs = mysqli_query($connection, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($user_id)
{
  global $connection;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE vote_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($connection, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $connection;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE vote_id = $vote_id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE vote_id = $vote_id AND rating_action='dislike'";
  $likes_rs = mysqli_query($connection, $likes_query);
  $dislikes_rs = mysqli_query($connection, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($vote_id)
{
  global $connection;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND vote_id=$vote_id AND rating_action='like'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($vote_id)
{
  global $connection;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND vote_id=$vote_id AND rating_action='dislike'";
  $result = mysqli_query($connection, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM votes";
$result = mysqli_query($connection, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);