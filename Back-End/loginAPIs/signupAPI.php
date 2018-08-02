<?php
header("Access-Control-Allow-Origin: *");
  session_start();
  $firstname = $lastname = $email = $pwd = $cpwd = ''; #initialize variables
  $inputArray = [$firstname, $lastname, $email, $pwd, $cpwd];
  $blank_fields = [];
  $is_filled = true;
  //echo "This is the signupAPI";
  if ($_SERVER["REQUEST_METHOD"] == "POST") { #input user data
    $firstname = clean_data($_POST["first"]);
    $lastname = clean_data($_POST["last"]);
    $email = clean_data($_POST["email"]);
    $pwd = clean_data($_POST["pass1"]);
    $cpwd = clean_data($_POST["pass2"]);
    foreach($inputArray as $row => $postRow){ #make array of inputs
      foreach($_POST as $postRow => $value){
        //echo not_filled($value);
        if (not_filled($value) === true) { #checks if each field is filled
          //$blank_fields[$postRow] = $postRow . " is required <br />";
          $blank_fields[$postRow] = $postRow;
          $is_filled = false;
          //echo '<br />' .implode($blank_fields);
        } #close if statement
      } #close inner foreach
    } #close outer foreach
    if (!empty($blank_fields)){
      //echo implode(" is required. <br/>", $blank_fields). " is required.";
      echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/signup.html";</script>';
    }
    //echo '<br />' .implode($blank_fields).  'is required <br />';
    if ($is_filled === true){
      // #check if email in correct format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script> alert("Invalid email format"); location.href = "../Front-End/signup.html";</script>'; #
        //echo "Invalid email format. Please try again. " ;
        //var_dump(!filter_var($email, FILTER_VALIDATE_EMAIL));
      }#closes if statement checking email format
      else{
        #check if email already exists
        $connection = mysqli_connect("localhost", "root", "", "questiondb");
        $select_query = "SELECT * from login where email = '$email'";
        $query = mysqli_query($connection, $select_query);
        if (mysqli_num_rows($query) != 0) { #checks to make sure email not already registered
        //  echo "Email already exists. Please try again. ";
          echo '<script> alert("Email already exists. Please try again. "); location.href = "../Front-End/signup.html";</script>';
        }#closes if statement checking email
        else{
          #check if password satisfies conditions
          //checkPassword($pwd);
          if (checkPassword($pwd) === true){
            #check if confirmation matches password
            if ($pwd != $cpwd) { #compares password and confirmation
              echo '<script> alert("Passwords do not match. Please try again."); location.href = "../Front-End/signup.html";</script>';
            //  echo "Passwords do not match. Please try again.";
            }
            else {
              $hashed_password = password_hash("$pwd", PASSWORD_DEFAULT); #hash password for security
              $pwd = $hashed_password;

              $connection = mysqli_connect("localhost", "root", "", "questiondb"); #adding user info to database
              $insert_query = "INSERT INTO login SET first_name = '$firstname', last_name = '$lastname', email = '$email', password = '$pwd'";
              $query = mysqli_query($connection, $insert_query);

              $select_query = "SELECT * from login where email = '$email'"; #check if sign up has been successful
              $query = mysqli_query($connection, $select_query);
              if (mysqli_num_rows($query) == 0) {
                echo "Sign up unsuccessful";
                echo '<script> alert("Sign up unsuccessful"); location.href = "../Front-End/signup.html";</script>'; #
              }
              else {
                $select_id = "SELECT user_id from login where email = '$email'";
                $id_query = mysqli_query($connection, $select_id);
                $row = mysqli_fetch_array($id_query, MYSQLI_ASSOC);
                $id = $row['user_id'];
                $_SESSION['user_id'] = $id; #save user_id as global variable
                //echo $_SESSION['user_id'];
                echo '<script> alert("Sign up successful"); location.href = "../../Front-End/QuestionsPage.html";</script>';
                }

            }
          } #closes if statement if checkPassword returns true
        } #closes else statement after checking email existence
      } #closes else statement after checking email format
  } #closes is_filled if statement
} #closes $_SERVER["REQUEST_METHOD"] == "POST" if statement


  function clean_data($data) { #cleans up entered data
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

  function checkPassword($password) { #checks if password satisfies conditions
    $errors = array();
    if(strlen($password) < 8) {
      $errors[] = 'Password must be at least 8 characters. '; #NEED TO FIGURE OUT HOW TO ALERT THIS
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
        echo '<br />' . implode($errors); #output all errors
          return false;
        }
    else {
      echo "Password is valid. ";
      return true;
    }
  }

?>
