<?php
$conn = mysqli_connect('localhost', 'root', '', 'questiondb');
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}
$sql = "SELECT * FROM question";
$result = mysqli_query($conn, $sql);
$json_array = array();
while($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;
}
echo json_encode($json_array);