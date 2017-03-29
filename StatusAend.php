<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<?php
include("config.php");
$door = $_GET["door"];
$status = $_GET["status"];

$sqlstatus = mysqli_query($conn,"UPDATE tuer SET Status ='".$status."' WHERE Raum = $door");
$query = "SELECT * FROM tuer WHERE Raum =$door";
$result = mysqli_query($conn, $query);
//根据SD请求（先看doorNr）改status
if(!$result)
{
    echo "Error:",mysqli_error($result);
    exit();
}
else {
    while ($row = mysqli_fetch_array($result)) {
        echo "<table width='80%' border=1 align='center' cellpadding=5 cellspacing=0>";
        echo "<tr align=`center`><td>Ebene</td><td>Bereich</td><td>Raum</td><td>Status</td><td>Zeit</td></tr>";


        echo '<tr align="center">';
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo "<td> $row[3] </td>";
        echo "<td> $row[4] </td>";
        echo "</tr>";
        // $sqlupdst = mysqli_query($conn,"UPDATE tuer SET Zeit=sysdate() WHERE Raum = $door");
    }
}
//Verbindung zu Datenbank beenden

$status = $_GET["status"];
$sqlstaus = mysqli_query($conn,"UPDATE tuer SET Status = $status WHERE Raum = $door");
mysqli_close($conn);

?>

<form action="Ausdruck.php" method = "get">
    Tuernummer bestaetigen <input type="id" name="door" /><br>
    <br>
    <input type="submit" name="submit" value="Tuernummer bestaetigen"/>

</form>
