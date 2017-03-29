<?php
include("config.php");//Datenbank verbinden

$id = $_GET["id"];// eingegebene Daten aus UI
$logsql = "SELECT * FROM mitarbeiter WHERE id =$id";//anhand Daten in Datenbank suchen
$logres = mysqli_query($conn, $logsql);


$exist = is_array($row = mysqli_fetch_array($logres)); // testen ob id existiert

if ($exist) { //
   // $_SESSION['id'] = $row['id']; // Session Wert geben
    $logstaff = mysqli_query($conn, "SELECT id FROM mitarbeiter WHERE Abteilung='Sicherheitsdienst'");
    //id von Sicherheitsdienst bekommen
    if ($row1 = mysqli_fetch_row($logstaff)) {
        if ($row[0] == $row1[0]) {
            ///testen ob Benutzer aus Sicherheitsdienst ist
            echo "<script type='text/javascript'>alert('Hi mate!');location='Verwaltung.html';</script>";

            //ja, dann besucht er/sie Verwaltungsseite

        }

        else {

         echo "<script type='text/javascript'>alert('Welcome!');location='Raum.html';</script>";

        }//nein, dann besucht er/sie Benutzersseite
    }
}
    else {
        echo "<script type='text/javascript'>alert('Falsche ID!');location='index.php';</script>";
        //falsche ID eingegeben

    }
//SESSION_DESTROY();

//Verbindung zu Datenbank beenden
mysqli_close($conn);
?>