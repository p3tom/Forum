<?php
    $conn = mysqli_connect('localhost', 'root', 'mysql', 'questiondb');
    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }
?>