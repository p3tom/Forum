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
            "<form method='POST' action='".setReply($conn)."'>
                <input type='hidden' name='uid' value='Anounymous'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='replySubmit'>Reply</button>
            </form>";
    getReply($conn);
    ?>
</body>
</html>
