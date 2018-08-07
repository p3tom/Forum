<?php
header("Access-Control-Allow-Origin: *");
  session_start();
  $email = $pwd = '';
  $inputArray = [$email, $pwd];
  $blank_fields = [];
  $is_filled = true;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = clean_data($_POST['email']);
    $pwd = clean_data($_POST['pass']);
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
      echo implode(" is required. <br/>", $blank_fields). " is required.";
      echo '<script> alert(implode($blank_fields)); location.href = "../Front-End/login.html";</script>';
      //echo '<br />' .implode($blank_fields).  'is required <br />';
    }
    if ($is_filled === true){
      // #check if email in correct format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script> alert("Invalid email format"); location.href = "../Front-End/login.html";</script>'; #
        //echo "Invalid email format. Please try again. " ;
        //var_dump(!filter_var($email, FILTER_VALIDATE_EMAIL));
      }#closes if statement checking email format
      else{
          $connection = mysqli_connect("localhost", "root", "mysql", "questiondb"); #checks if email matches to database
          $select_query = "SELECT * from login where email = '$email'";
          $query = mysqli_query($connection, $select_query);
          if (mysqli_num_rows($query) == 0) {
            echo "No matches found";
            echo '<script> alert("No matches found"); location.href = "../Front-End/login.html";</script>'; #
          }
          else {
            $select_password = "SELECT password from login where email = '$email'";
            $pwd_query = mysqli_query($connection, $select_password);
            $row = mysqli_fetch_array($pwd_query, MYSQLI_ASSOC);
            $hash = $row['password'];
            //echo $hash; #check if password being retrieved
            if (password_verify($pwd, $hash)) {
             echo "Login successful";
            } else {
             echo "Invalid password";
            }
            $select_id = "SELECT user_id from login where email = '$email'";
            $id_query = mysqli_query($connection, $select_id);
            $row = mysqli_fetch_array($id_query, MYSQLI_ASSOC);
            $id = $row['user_id'];
            $_SESSION['user_id'] = $id; #save user_id as global variable
            echo $_SESSION['user_id'];
            echo '<script> alert("Log in successful"); location.href = "../../Front-End/QuestionsPage.html";</script>';
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
