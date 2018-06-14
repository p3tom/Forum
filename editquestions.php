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
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
            echo
            "<form method='POST' action='".editQuestion($conn)."'>
                <input type='hidden' name='cid' value='".$cid."'>
                <input type='hidden' name='uid' value='".$uid."'>
                <input type='hidden' name='date' value='".$date."'>
                <textarea name='message'>".$message."</textarea><br>
                <button type='submit' name='Submitquestion'>Submit</button>
            </form>";
    ?>
</body>
</html>