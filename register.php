<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>MovieRAMA | Register</title>
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
  <a style="font-size:18px; font-weight:bold;" href="login.php">Login</a>&nbsp;
  <a style="font-size:18px; font-weight:bold;" href="about">About MovieRAMA</a>&nbsp;
  <br><br><br>
<?php
    require('database.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully</h3>
                  <p class='link'>Click in login page in order to redirect to your dashboard.</p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <input id="username_register" type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input id="email_register" type="text" class="login-input" name="email" placeholder="Email Adress" required><br>
        <input id="password_register" type="password" class="login-input" name="password" placeholder="Password" required><br><br>
        <input id="button_register" type="submit" name="submit" value="Register" class="login-button">
    </form>
<?php
    }
?></center>
</body>
</html>
