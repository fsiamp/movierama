<?php 
// connect to database
$conn = mysqli_connect('localhost', 'root', 'root', 'movierama');

// lets assume a user is logged in with id $user_id
$user_id = $_SESSION['username'];

if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error($conn));
  exit();
}

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO ratings (user_id, post_id, rating_action) 
         	   VALUES ('{$user_id}', $post_id, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO ratings (user_id, post_id, rating_action) 
               VALUES ('{$user_id}', $post_id, 'dislike') 
         	   ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM ratings WHERE user_id='{$user_id}' AND post_id=$post_id";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM ratings WHERE user_id='{$user_id}' AND post_id=$post_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  mysqli_query($conn, $sql);
  echo getRating($post_id);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM ratings 
  		  WHERE post_id = $id AND rating_action='like'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $conn;
  $sql = "SELECT COUNT(*) FROM ratings 
  		  WHERE post_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $conn;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM ratings WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM ratings 
		  			WHERE post_id = $id AND rating_action='dislike'";
  $likes_rs = mysqli_query($conn, $likes_query);
  $dislikes_rs = mysqli_query($conn, $dislikes_query);
  $likes = mysqli_fetch_array($likes_rs);
  $dislikes = mysqli_fetch_array($dislikes_rs);
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM ratings WHERE user_id='{$user_id}' 
  		  AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $conn;
  global $user_id;
  $sql = "SELECT * FROM ratings WHERE user_id='{$user_id}'
  		  AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  	return true;
  }else{
  	return false;
  }
}

function updateLikes($likes,$post_id)
{
  global $conn;
  $sql = "UPDATE posts SET likes='{$likes}' WHERE id='{$post_id}'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

function updateHates($hates,$post_id)
{
  global $conn;
  $sql = "UPDATE posts SET hates='{$hates}' WHERE id='{$post_id}'";
  $rs = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'members') !== false) {
  $link = $_SERVER['REQUEST_URI'];
  $link_array = explode('=',$link);
  $page = end($link_array);
  if ($_POST['sorting'] == "date") {
    $sql = "SELECT * FROM posts WHERE uploader='{$page}' ORDER BY date DESC";
  }
  else if ($_POST['sorting'] == "likes") {
    $sql = "SELECT * FROM posts WHERE uploader='{$page}' ORDER BY likes DESC";
  }
  else if ($_POST['sorting'] == "hates") {
    $sql = "SELECT * FROM posts WHERE uploader='{$page}' ORDER BY hates DESC";
  }
  else {
    $sql = "SELECT * FROM posts WHERE uploader='{$page}' ORDER BY id DESC";
  }
}
else {
  if (strpos($url,'search') == false) {
    if ($_POST['sorting'] == "date") {
      $sql = "SELECT * FROM posts ORDER BY date DESC";
    }
    else if ($_POST['sorting'] == "likes") {
      $sql = "SELECT * FROM posts ORDER BY likes DESC";
    }
    else if ($_POST['sorting'] == "hates") {
      $sql = "SELECT * FROM posts ORDER BY hates DESC";
    }
    else {
      $sql = "SELECT * FROM posts ORDER BY id DESC";
    }
  }
  else {
    $searchString = $_GET['search'];
    $link = $_SERVER['REQUEST_URI'];
    $link_array = explode('=',$link, 2);
    $page = end($link_array);
    $newsearch = strtok($page, '&');

    if ($_POST['sorting'] == "date") {
      $sql = "SELECT * FROM posts WHERE text LIKE '%".$newsearch."%' ORDER BY date DESC";
    }
    else if ($_POST['sorting'] == "likes") {
      $sql = "SELECT * FROM posts WHERE text LIKE '%".$newsearch."%' ORDER BY likes DESC";
    }
    else if ($_POST['sorting'] == "hates") {
      $sql = "SELECT * FROM posts WHERE text LIKE '%".$newsearch."%' ORDER BY hates DESC";
    }
    else {
      $sql = "SELECT * FROM posts WHERE text LIKE '%".$newsearch."%' ORDER BY id DESC";
    }
  }
}

$result = mysqli_query($conn, $sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
