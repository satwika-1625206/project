<?php
include 'connect2.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);

?>