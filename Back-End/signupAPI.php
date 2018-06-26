<?php
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $email = $_POST['email'];
  $pwd = $_POST['password'];

  $connection = mysqli_connect("localhost", "root", "", "login_table");

  mysqli_query($connection, INSERT INTO `user_info`(`first_name`, `last_name`, `email`, `password`, `id`)
    VALUES ('$firstname', '$lastname', '$email', '$pwd','');
?>
<form action = "signupAPI.php" method = "POST">
  Full name <input type = "text" name = "full_name"/>
  <br/>
  Email <input type = "text" name = "email"/>
  <br/>
  Password <input type = "password" name = "password"/>
  <br/>
  <input type = "submit" value = "Register"/>
</form>
