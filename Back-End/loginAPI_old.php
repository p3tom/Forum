<?php
  session_start();
  $inputArray = [$email, $pwd];
  $blank_fields = [];
  $is_filled = true;

  if (isset ($_REQUEST['submit_request'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pwd = $_POST['pass'];
      if (empty($_POST['email'])) {
      $emailErr = "Email is required";
      } else {
        $email = clean_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
        else {
          if (empty($_POST['pass'])) {
            $pwdErr = "Password is required";
          } else {
            $pwd = clean_data($_POST['pass']);
            $connection = mysqli_connect("localhost", "root", "mysql", "questiondb"); #checks if email matches to database
            $select_query = "SELECT * from login where email = '$email'";
            $query = mysqli_query($connection, $select_query);
            if (mysqli_num_rows($query) == 0) {
              echo "Invalid email";
            }
            else {
              $select_password = "SELECT password from login where email = '$email'";
              $pwd_query = mysqli_query($connection, $select_password);
              $row = mysqli_fetch_array($pwd_query, MYSQLI_ASSOC);
              $hash = $row['pass'];
              //echo $hash; #check if password being retrieved
              if (password_verify($pwd, $hash)) { #keeps showing invalid password
               echo "Login successful";
              } else {
               echo "Invalid password";
              }
              $data = mysqli_fetch_array($query);
              $_SESSION['user_id'] = $data['id'];
              $_SESSION['email'] = $data['email'];
            }
          }
        }
      }
    }
  }

    function clean_data($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function not_filled($input){
      if (empty($input)) {
        return true; //input is not filled
      }
      else {
        return false; //input is filled
      }
    }

?>
