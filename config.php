<?php

//connect database
$conn=mysqli_connect('localhost','root','12345678');
if(! $conn)
{
    die("Could not connect".mysqli_error($conn));
}
mysqli_select_db($conn,"mysql");

?>



