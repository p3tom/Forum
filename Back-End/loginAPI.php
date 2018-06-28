<?php
  session_start();
  $emailErr = $pwdErr = '';
  $email = $pwd = '';

  if (isset ($_REQUEST['submit_request'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
      if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      } else {
      $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["password"])) {
        $pwdErr = "Password is required";
      } else {
        $pwd = test_input($_POST["password"]);
      }
        $connection = mysqli_connect("localhost", "root", "", "questiondb"); #checks if email and password matches to database
        $select_query = "SELECT * from login where email = '$email' AND password = '$pwd'";
        $query = mysqli_query($connection, $select_query);
        if (mysqli_num_rows($query) == 0) {
          echo "Please check your email and password.";
        }
        else {
          $data = mysqli_fetch_array($query);
          $_SESSION['user_id'] = $data['id'];
          $_SESSION['email'] = $data['email'];
          echo "Login successful";
        }
    }
  }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
  Email <input type = "text" name = "email"/>
  <br/>
  Password <input type = "password" name = "password"/>
  <br/>
  <input type = "submit" name = "submit_request" value = "Log In"/>
</form>
