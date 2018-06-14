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
        echo
            "<form method='POST' action='".setQuestion($conn)."'>
                <input type='hidden' name='uid' value='Anounymous'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='Submitquestion'>Submit Question</button>
            </form>";
    getQuestion($conn);
    ?>
</body>
</html>
