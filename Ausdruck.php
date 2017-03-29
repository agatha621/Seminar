<html>
<head>
    <title>Ausdrucksversion</title>
</head>
<body>
<h2 style="text-align:center">Nachweiss ueber angeforderte Schliessdienste</h2>

<?php
include("config.php");
//
$door = $_GET["door"];
$query = "SELECT * FROM tuer WHERE Raum = $door";
$result =mysqli_query($conn,$query);

if(!$result)
{
    echo "Error:",mysqli_error($result);
    exit();
}
else {
    if (mysqli_num_rows($result) > 0) {

        echo "<table width='80%' border=1 align='center' cellpadding=5 cellspacing=0>";
        echo "<tr align=`center`><td>Ebene</td><td>Bereich</td><td>Raum</td><td>Wer hat den SD angefordert</td><td>Zeit des SD</td><td>Ausfuehrlich durch?</td><td>Bemerkungen</td></tr>";

        while ($row = mysqli_fetch_array($result)) {

            echo '<tr align="center">';
            echo "<td> $row[0] </td>";
            echo "<td> $row[1] </td>";
            echo "<td> $row[2] </td>";
            echo "<td> $row[6] </td>";
            echo "<td> $row[4] </td>";
            echo "<td>  </td>";
            echo "<td>  </td>";
            echo "</tr>";
        }
    }
}
//Verbindung zu Datenbank beenden
mysqli_close($conn);
?>

</body>
</html>


