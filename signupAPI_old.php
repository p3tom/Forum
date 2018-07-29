<?php
  $firstnameErr = $lastnameErr = $emailErr = $pwdErr = $cpwdErr = '';
  $firstname = $lastname = $email = $pwd = $cpwd = '';
  //if (isset ($_REQUEST['submit_request'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) { #makes sure first name entered
      $firstnameErr = "First name is required";
    } else {
      $firstname = test_input($_POST["first_name"]);
    }
    if (empty($_POST["last_name"])) { #makes sure last name entered
      $lastnameErr = "Last name is required";
    } else {
      $lastname = test_input($_POST["last_name"]);
    }
    if (empty($_POST["email"])) { #makes sure email entered
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]); #makes sure email in form __@___
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
      $connection = mysqli_connect("localhost", "root", "", "questiondb");
      $select_query = "SELECT * from login where email = '$email'";
      $query = mysqli_query($connection, $select_query);
      if (mysqli_num_rows($query) != 0) { #checks to make sure email not already registered
        exit("Email already exists. Please try again. ");
      }
    }
    if (empty($_POST["password"])) { #makes sure password entered
      $pwdErr = "Password is required";
    } else {
      $pwd = test_input($_POST["password"]);
          $hashed_password = password_hash("$pwd", PASSWORD_DEFAULT); #hash password for security
          //var_dump($hashed_password); #check if password is hashed
    }
    if (empty($_POST["confirm_password"])) { #makes sure password confirmed
      $cpwd = "Password confirmation is required";
    } else {
      $cpwd = test_input($_POST["confirm_password"]);
    }
    if ($pwd != $cpwd) { #compares password and confirmation
      echo "Passwords do not match. Please try again.";
    }
    else {
      $pwd = $hashed_password;
      $connection = mysqli_connect("localhost", "root", "", "questiondb"); #adding user info to database
      $insert_query = "INSERT INTO login SET first_name = '$firstname', last_name = '$lastname', email = '$email', password = '$pwd'";
      $query = mysqli_query($connection, $insert_query);
      echo "Sign up successful";
    }
  }
  //}

function test_input($data) { #cleans up entered data
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function checkPassword($password) { #checks if password satisfies conditions
  $errors = array();
  if(strlen($password) < 8) {
    $errors[] = 'Password must be at least 8 characters. ';
  }
  if(preg_match("/[A-Z]/", $password) === 0){
     $errors[] = 'Password must contain an uppercase letter. ';
  }
  if(preg_match("/[a-z]/", $password) === 0) {
      $errors[] = 'Password must contain a lowercase letter. ';
  }
  if(preg_match("/[0-9]/", $password) === 0) {
      $errors[] = 'Password must contain a number. ';
  }
  if(empty($errors) === false){
      echo '<br />' . implode($errors); #not outputting all the errors
        return false;
      }
  else {
    echo "Password is valid. ";
    return true;
  }
}

?>

<form action = "signupAPI.php" method = "POST" >
  First Name: <input type="text" name="first_name">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="last_name">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  E-mail:
  <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password:
  <input type="password" name="password">
  <span class="error"><?php echo $pwdErr;?></span>
  <br><br>
  Confirm Password:
  <input type="password" name="confirm_password">
  <span class="error"><?php echo $cpwdErr;?></span>
  <br><br>
  <input type = "submit" name = "submit_request" value = "Sign Up"/>
</form>
