<html>
<head>
    <title>Raum</title>
</head>
<body>
<h2 style="text-align:center">Tuer Situation</h2>

<?php
include("config.php");

$door = $_GET["door"];
$query = "SELECT * FROM tuer WHERE Raum =$door";
$result = mysqli_query($conn, $query);

if(!$result)
{
    echo "Error:",mysqli_error($result);
    exit();
}
else{
if (mysqli_num_rows($result) > 0) {

    echo "<table width='80%' border=1 align='center' cellpadding=5 cellspacing=0>";
    echo "<tr align=`center`><td>Ebene</td><td>Bereich</td><td>Raum</td><td>Status</td><td>Zeit</td></tr>";
    while ($row = mysqli_fetch_array($result)) {
        if ($row[3] != "verboten") {

            echo '<tr align="center">';
            echo "<td> $row[0] </td>";
            echo "<td> $row[1] </td>";
            echo "<td> $row[2] </td>";
            echo "<td> $row[3] </td>";
            echo "<td> $row[4] </td>";
            echo "</tr>";
             }
        else{
            echo "<script type='text/javascript'>alert('Verboten!');location='Raum.html';</script>";
        }
    }
}
else {

        echo "<script type='text/javascript'>alert('Tuernummer ist falsch!');location='Raum.html';</script>";
    }
;}
//Verbindung zu Datenbank beenden
mysqli_close($conn);
?>

<h2>Was wollen Sie?</h2>
<form action="SDbestae.html" method = "get">
    <input type="submit" value="SD bestaetigen"/>
</form><br>
<br>
<form action="index.php" method = "get">
    <input type="submit" value="Zu Startsite"/>
</form><br>
<br>
<form action="Raum.html" method = "get">
    <input type="submit" value="Zu Tuerdienst"/>
</form>


</body>
</html>


