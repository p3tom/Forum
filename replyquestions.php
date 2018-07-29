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
    <title>Reply Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php
        echo
            "<form method='POST' action='".setReply($conn)."'>
                <input type='hidden' name='user_id' value='Anounymous'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='Submitreply'>Submit Reply</button>
            </form>";
    ?>
</body>
</html>
