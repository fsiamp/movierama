<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>MovieRAMA | Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
<center><br><br><a href="index.php"><img src="assets/logo.png"></a><br><br>
<form action="index.php?search=" method="get">
    <object><input type="text" id="searchbar" name="search" placeholder="Title" required autofocus>&nbsp;<input type="submit" name="execute" value="Search Movies"></object>
  </form><br>
  <object class="custom-select" style="font-size:18px;">
  <a style="font-size:18px; font-weight:bold;" href="index.php">Home</a>&nbsp;  
  <a style="font-size:18px; font-weight:bold;" href="register.php">Register</a>&nbsp;
  <a style="font-size:18px; font-weight:bold;" href="about">About MovieRAMA</a>&nbsp;
  <br><br><br>
<?php
    require('database.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password</h3>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <input id="username_login" type="text" name="username" placeholder="Username" autofocus="true" required/><br>
        <input id="username_password" type="password" name="password" placeholder="Password" required/><br><br>
        <input id="login_button" type="submit" value="Login" name="submit" class="login-button"/>
  </form>
<?php
    }
?></center>
</body>
</html>
