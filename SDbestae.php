<?php
include("config.php");
$door = $_GET["door"];
$id = $_GET["id"];

$query1 = "SELECT * FROM tuer WHERE Raum =$door";
$query2 = "SELECT * FROM mitarbeiter WHERE id =$id";
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
//根据SD请求（先看doorNr）改status

$exist1 = is_array($row = mysqli_fetch_array($result1)); // testen ob id existiert
$exist2 = is_array($row = mysqli_fetch_array($result2));
$row = mysqli_fetch_array($result1);
if (! $exist1||! $exist2) {
    echo "<script type='text/javascript'>alert('Raum oder ID existiert nicht!');location='SDbestae.html';</script>";
}
else{

    if ($row[3] != "verboten") {
        //echo "<script type='text/javascript'>alert('Verboten!');location='SDbestae.html';</script>";
        $sqlanf = mysqli_query($conn, "UPDATE tuer SET Anfordern =$id WHERE Raum = $door");
        $sqlzeit = mysqli_query($conn, "UPDATE tuer SET Zeit =sysdate() WHERE Raum = $door");
        $sqlname = mysqli_query($conn, "UPDATE tuer, mitarbeiter SET Anf_name =mitarbeiter.Name WHERE tuer.Anfordern = mitarbeiter.id");



    }
    else {
        //$sqlanf = mysqli_query($conn, "UPDATE tuer SET Anfordern =$id WHERE Raum = $door");
        //$sqlzeit = mysqli_query($conn, "UPDATE tuer SET Zeit =sysdate() WHERE Raum = $door");
        echo "<script type='text/javascript'>alert('Verboten!');location='SDbestae.html';</script>";
}
}

//Verbindung zu Datenbank beenden

mysqli_close($conn);

?>

<h2>Was wollen Sie?</h2>
<form action="index.php" method = "get">
    <input type="submit" value="Zu Startsite"/>
</form><br>
<br>
<form action="Raum.html" method = "get">
    <input type="submit" value="Zu Tuerdienst"/>
</form>

