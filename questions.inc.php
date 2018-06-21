<?php
function setQuestion($conn){
    if(isset($_POST['Submitquestion'])){
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "INSERT INTO question(user_id, date, message) VALUES('$user_id', '$date', '$message')";
        $result = mysqli_query($conn, $sql);    
    }
}

function getQuestion($conn){
    $sql = "SELECT * FROM question";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
       echo"<div class='comment-box'><p>"; 
          echo $row['user_id']."<br>";
          echo $row['date']."<br>";
          echo nl2br($row['message']);
        echo"</p>

            <form class='reply-form' method='POST' action='replyquestions.php'>
                <input type='hidden' name='ques_id' value='".$row['ques_id']."'>
                <button id ='".$row['ques_id']."' value='".$row['ques_id']." class = 'reply1' type='submit' name='reply'>Reply</button>
            </form>  
        
            <form class='delete-form' method='POST' action='".deleteQuestion($conn)."'>
                <input type='hidden' name='ques_id' value='".$row['ques_id']."'>
                <button type='submit' name='Submitdelete'>Delete</button>
            </form>         
        
             <form class='edit-form' method='POST' action='editquestions.php'>
                <input type='hidden' name='ques_id' value='".$row['ques_id']."'>
                <input type='hidden' name='user_id' value='".$row['user_id']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message'  value='".$row['message']."'>
                <button>Edit</button>
            </form> 
        </div>";
    }  
}

function editQuestion($conn){
    if(isset($_POST['Submitquestion'])){
        $ques_id = $_POST['ques_id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "UPDATE question SET message='$message', date='$date'  WHERE ques_id='$ques_id'";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");
    }
}

function deleteQuestion($conn){
    if(isset($_POST['Submitdelete'])){
        $ques_id = $_POST['ques_id'];
        $sql = "DELETE FROM question WHERE ques_id='$ques_id'";
        $result = mysqli_query($conn, $sql);
        header("Location: index.php");
    }
}

function setReply($conn){
    if(isset($_POST['Submitreply'])){
        $ques_id = $_GET['reply'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "INSERT INTO reply(ques_id, user_id, date, message) VALUES('ques_id','$user_id', '$date', '$message')";
        $result = mysqli_query($conn, $sql);   

    }
}
/*function getReply($conn){
    $sql2 = "SELECT * FROM reply";
    $result2 = mysqli_query($conn, $sql2);
    while($row = mysqli_fetch_assoc($result2)){
        $reply_id = $_POST['reply_id'];
        $ques_id = $_POST['ques_id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        echo"<div class='comment-box'><p>"; 
        echo $row['reply_id']."<br>";
        echo $row['user_id']."<br>";
        echo $row['date']."<br>";
        echo nl2br($row['message']);
        echo "</p>
        
        </div>";
    }
}*/



