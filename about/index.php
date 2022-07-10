<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <meta charset="UTF-8">
  <title>MovieRAMA | About MovieRAMA</title>
  <link rel="icon" type="image/x-icon" href="../assets/favicon.png">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  <center><br><br><a href="../index.php"><img src="../assets/logo.png"></a><br><br>
  <form action="../index.php?search=" method="get">
    <object><input type="text" style="width:30%;" name="search" placeholder="Title" required autofocus>&nbsp;<input type="submit" name="execute" value="Search Movies"></object>
  </form><br>
  <object class="custom-select" style="font-size:18px;">
  <a style="font-size:18px; font-weight:bold;" href="../index.php">Home</a>&nbsp;
  <?php if(!isset($_SESSION["username"])): ?>
	<a style="font-size:18px; font-weight:bold;" href="../login.php">Login</a>&nbsp;
	<a style="font-size:18px; font-weight:bold;" href="../register.php">Register</a>&nbsp;
  <?php else: ?>
	<a style="font-size:18px; font-weight:bold;" href="../submitmovie.php">Submit Movie</a>&nbsp;
	<a style="font-size:18px; font-weight:bold;" href="../logout.php">Logout</a>&nbsp;
  <?php endif ?>
  </object>
  <div class="posts-wrapper">

  <br><object>MovieRAMA is a place in which users are able to view, search and submit movies.<br>
      Each movie can be liked or disliked depending on the preference of user.<br><br>

      Furthermore, submitters cannot vote their movies.<br><br>

      Also, sorting can be applied based on publication date, number of likes and number of hates.<br><BR>

      Submission of movies is only allowed to registered members.<BR>
      </object><br>

   	</div>
  </div><br><br></center>
  <script src="javascript/script.js"></script>
</body>
</html>