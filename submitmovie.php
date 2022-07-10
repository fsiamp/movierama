<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>MovieRAMA | Submit Movie</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<center><br><br><a href="index.php"><img src="assets/logo.png"></a><br><br>
  <form action="index.php?search=" method="get">
    <object><input type="text" style="width:30%;" name="search" placeholder="Title" required autofocus>&nbsp;<input type="submit" name="execute" value="Search Movies"></object>
  </form><br>
  <object class="custom-select" style="font-size:18px;">
  <a style="font-size:18px; font-weight:bold;" href="index.php">Home</a>&nbsp;  
  <a style="font-size:18px; font-weight:bold;" href="logout.php">Logout</a>&nbsp;
  <a style="font-size:18px; font-weight:bold;" href="about">About MovieRAMA</a>&nbsp;
  <br><br><br>
<?php
    require('database.php');
    session_start();
    // When form submitted, insert values into the database.
    if (isset($_POST["title"])) {
        // removes backslashes
        $uploader = stripslashes($_SESSION["username"]);
        //escapes special characters in a string
        $uploader = mysqli_real_escape_string($con, $uploader);
        $title    = stripslashes($_REQUEST['title']);
        $title    = mysqli_real_escape_string($con, $title);
        $description = stripslashes($_REQUEST['description']);
        $description = mysqli_real_escape_string($con, $description);
        $publication_date = date("Y-m-d H:i:s");
        $query    = "INSERT into `posts` (uploader, text, description, date, likes, hates)
                     VALUES ('{$uploader}', '{$title}', '{$description}', '{$publication_date}', 0, 0)";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Your movie was submitted successfully</h3>
                  <p>Return to your <a href='index.php'>dashboard</a></p><br>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <input id="movietitle" type="text" name="title" placeholder="Title" required /><br>
        <textarea top:5px;" id="moviedescription" name="description" placeholder="Description" rows="15" required></textarea> <br><br>
        <input type="hidden" name="uploader" value="<?php echo $_SESSION['username']; ?>">
        <input type="submit" id="submitbutton" name="submit" value="Submit Movie" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>
