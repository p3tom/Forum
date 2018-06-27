<?php
  if (isset ($_REQUEST['submit_request'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $cpwd = $_POST['confirm_password'];
    if (($firstname != '') && ($lastname != '') && ($email != '') && ($pwd != '') && ($cpwd != '')){
      if ($pwd != $cpwd) {
        echo "Passwords do not match. Please try again.";
      }
      else {
        $connection = mysqli_connect("localhost", "root", "", "questiondb");
        $insert_query = "INSERT INTO login SET first_name = '$firstname', last_name = '$lastname', email = '$email', password = '$pwd'";
        $query = mysqli_query($connection, $insert_query);
        echo "Sign up successful";
      }
    }

    else {
      echo "Please fill out all of the fields.";
    }
    }
?>

<form action = "signupAPI.php" method = "POST">
  First Name <input type = "text" name = "first_name"/>
  <br/>
  Last Name <input type = "text" name = "last_name"/>
  <br/>
  Email <input type = "text" name = "email"/>
  <br/>
  Password <input type = "password" name = "password"/>
  <br/>
  Confirm Password <input type = "password" name = "confirm_password"/>
  <br/>
  <input type = "submit" name = "submit_request" value = "Sign Up"/>
</form>
