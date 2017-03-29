<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>
<h2>Schliessdienst</h2>
<body>

<?php
include("config.php");
$dienstres = mysqli_query($conn, "SELECT * FROM tuer WHERE Zeit IS NOT NULL ");

if(!$dienstres)
{
 echo "Error:",mysqli_error($dienstres);
  exit();
}
else{
    if (mysqli_num_rows($dienstres) > 0) {
        echo "<table width='80%' border=1 align='center' cellpadding=5 cellspacing=0>";
        echo "<tr align=`center`><td>Ebene</td><td>Bereich</td><td>Raum</td><td>Status</td><td>Zeit</td></tr>";
        while ($row = mysqli_fetch_array($dienstres)) {

            echo '<tr align="center">';
            echo "<td> $row[0] </td>";
            echo "<td> $row[1] </td>";
            echo "<td> $row[2] </td>";
            echo "<td> $row[3] </td>";
            echo "<td> $row[4] </td>";
            echo "</tr>";
        }
    }
    else {

        echo "<script type='text/javascript'>alert('Noch kein Rufen');location='StatusVerw.php';</script>";
    }
    echo "</table>";
}

//Verbindung zu Datenbank beenden
mysqli_close($conn);
?>
    <h2>Tuernummer eingeben</h2>
    <form action="StatusAend.php" method = "get">
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


