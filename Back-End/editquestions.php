<?php
    date_default_timezone_set('Europe/Oslo');
    include 'dba.inc.php';
    include 'questions.inc.php';
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php
         ques_id = $_POST['ques_id'];
         user_id = $_POST['user_id'];
         date = $_POST['date'];
         #title = $_POST['title'];
         message = $_POST['message'];
            echo
            "<form method='POST' action='".editQuestion($conn)."'>
                <input type='hidden' name='ques_id' value='".$ques_id."'>
                <input type='hidden' name='user_id' value='".$user_id."'>
                <input type='hidden' name='date' value='".$date."'>
                <input type='hidden' name='title' value='".$title."'>
                <textarea name='message'>".$message."</textarea><br>
                <button type='submit' name='Submitquestion'>Submit</button>
            </form>";
    ?>
</body>
</html>
