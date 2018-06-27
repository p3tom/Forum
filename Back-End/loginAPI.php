<?php
  session_start();
  if (isset ($_REQUEST['submit_request'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    if (($email != '') && ($pwd != '')){
        $connection = mysqli_connect("localhost", "root", "", "questiondb");
        $select_query = "SELECT * from login where email = '$email', password = '$pwd'";
        $query = mysqli_query($connection, $select_query);
        if (mysqli_num_rows($query) == 0) {
          echo "Please check your email and password.";
        }
        else {
          $data = mysqli_fetch_query($query);
          $_SESSION['user_id'] = $data['id'];
          echo "Login successful";
        }
    }
    else {
      echo "Please fill out all of the fields.";
    }
    }
?>

<form action = "loginAPI.php" method = "POST">
  Email <input type = "text" name = "email"/>
  <br/>
  Password <input type = "password" name = "password"/>
  <br/>
  <input type = "submit" name = "submit_request" value = "Log In"/>
</form>
