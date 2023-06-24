<?php

function OpenCon()
 {
    $conn = new mysqli('localhost','root','','xyz');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed  : ". $conn->connect_error);
    }
 $db = "xyz";

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>