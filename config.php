<?php
$conn=mysqli_connect('localhost','root','12345678');//Datenbank verbinden
if(! $conn)
{
    die("Verbinden nicht erfolgreich".mysqli_error($conn));//Verbindung nicht moeglich
}
mysqli_select_db($conn,"mysql");

?>



