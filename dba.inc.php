<?php
    $conn = mysqli_connect('localhost', 'root', '', 'questiondb');
    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }
?>