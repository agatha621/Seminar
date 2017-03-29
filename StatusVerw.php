<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<?php
include("config.php");
$query = "SELECT * FROM tuer";
$result = mysqli_query($conn, $query);
//
if(!$result)
{
    echo "Error:",mysqli_error($result);
    exit();
}
else {
    echo "<table width='80%' border=1 align='center' cellpadding=5 cellspacing=0>";
    echo "<tr align=`center`><td>Ebene</td><td>Bereich</td><td>Raum</td><td>Status</td><td>Zeit</td></tr>";
    while ($row = mysqli_fetch_array($result)) {

        echo '<tr align="center">';
        echo "<td> $row[0] </td>";
        echo "<td> $row[1] </td>";
        echo "<td> $row[2] </td>";
        echo "<td> $row[3] </td>";
        echo "<td> $row[4] </td>";
        echo "</tr>";
    }
}
echo "</table>";

//Verbindung zu Datenbank beenden
mysqli_close($conn);
?>
<h2>Raumnummer eingeben</h2>
<form action="status.php" method = "get">
    Raumnummer：<input type="text" name="door"/>
    <select name="status">
        <option value="NICHTS">Status von Schliessdienst:</option>
        <option value="sofort">sofort</option>
        <option value="warten">warten</option>
        <option value="verboten">verboten</option>
    </select>

    <input type="submit" value="OK"/>
</form>
</body>
</html>


