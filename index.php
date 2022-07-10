<?php 
session_start();
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <meta charset="UTF-8">
  <title>MovieRAMA</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.png">
  <link rel="stylesheet" href="css/font-awesome.min.css" />

  <link rel="stylesheet" href="css/main.css">
  <script src="jquery/jquery.min.js"></script>
</head>
<body>
  <center><br><br><a href="index.php"><img src="assets/logo.png"></a><br><br>
  <form action="index.php?search=" method="get">
    <object><input type="text" id="searchbar" name="search" placeholder="Title" required autofocus>&nbsp;<input type="submit" name="execute" value="Search Movies"></object>
  </form><br>
  <object class="custom-select" style="font-size:18px;">
  <?php if(!isset($_SESSION["username"])): ?>
	<a style="font-size:18px; font-weight:bold;" href="login.php">Login</a>&nbsp;
	<a style="font-size:18px; font-weight:bold;" href="register.php">Register</a>&nbsp;
  <?php else: echo "<object>Welcome <b>".$_SESSION['username']."</b>!</object><br><br>" ?>
	<a style="font-size:18px; font-weight:bold;" href="submitmovie.php">Submit Movie</a>&nbsp;
	<a style="font-size:18px; font-weight:bold;" href="logout.php">Logout</a>&nbsp;
  <?php endif ?>
  <a style="font-size:18px; font-weight:bold;" href="about">About MovieRAMA</a>&nbsp;
  <form action="" method="POST" style="display:inline;">
	<select id="" style="font-size:18px; cursor:pointer;" name="sorting" onchange='if(this.value != 0) { this.form.submit(); }' required>
	    <option value="">Sort by:</option>
		<option value="likes">Likes</option>
		<option value="hates">Hates</option>
		<option value="date">Date</option>
	</select>
  </form>
  </object>
  <div class="posts-wrapper" id="posts-wrapper">
   <?php foreach ($posts as $post) { ?>
      <?php 
	    echo "<div class='post' id='post' num='".$post['id']."'>";
	    echo "<b>".$post['text']."</b><br><br>";
	    echo $post['description']."<br>";
		$uploader = $post['uploader'];
		echo "<br>Submitted by <a href='?members=$uploader'>".$uploader."</a><br>";
		echo "<br>Posted in ".$post['date']."<br>";
		$likes=getLikes($post['id']);
		$hates=getDislikes($post['id']);
		updateLikes($likes,$post['id']);
		updateHates($hates,$post['id']);
	  ?>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if(!isset($_SESSION["username"])): ?>
              class="body"
		  <?php elseif($post['uploader']==$user_id): ?>
              class="body"
		  <?php elseif (userLiked($post['id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['id'])." likes"; ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i <?php if(!isset($_SESSION["username"])): ?>
              class="body"
		   <?php elseif($post['uploader']==$user_id): ?>
              class="body"
      	  <?php elseif (userDisliked($post['id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['id'])." hates"; ?></span>
      </div>
   	</div>
   <?php } ?>
  </div><br><br></center>
  <script src="javascript/script.js"></script>
</body>
</html>