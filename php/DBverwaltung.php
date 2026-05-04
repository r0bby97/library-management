<?php
    // Daniela Scheling und ich haben uns für die Bearbeitung getroffen. Wir haben uns bei der Bearbeitung der Aufgaben gegeseitig untestützt.

    
    $servername = 'localhost';
    $socket = '8080';
    $username = 'root';
    $password = '';
    $dbname = 'robert3';


    // Werte aus den Eingaben von signUp.html
    $name = $_POST["nachname"];
    $vorname = $_POST["vorname"];
    $email = $_POST["email"];
    $passwort = $_POST["passwort"];



    // Verbindung herstellen und überprüfen
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error) {
      die('Verbindung mit der Datenbank fehlgeschlagen: ' . $conn -> connect_error);
    }



        // Tabelle erstellen
        $sql1 = "CREATE TABLE IF NOT EXISTS users(
        userid int(11) unsigned auto_increment primary key, name varchar(50),
        vorname varchar(50), email varchar(50), passwort varchar(50))";
        $conn -> query($sql1) or die('Erzeugen der Tabelle fehlgeschlagen: ' . $conn -> error);

        // Benutzer einfügen
        function insertUser($conn, $name, $vorname, $email, $passwort) {
          $datensatz = "SELECT * FROM users WHERE email = '$email'";
          $result = $conn -> query($datensatz);
          $rowcount = mysqli_num_rows($result);
          if ($rowcount == 0) { // Nutzer nicht vorhanden
            $sql2 = "INSERT INTO users (name, vorname, email, passwort)
            VALUES('$name', '$vorname', '$email', '$passwort')";
            $conn -> query($sql2) or die('Speichern des Datensatzes fehlgeschlagen: ' . $conn -> error);
          } else {
            die('Emailadresse bereits registriert: Gehen Sie zum login' . $conn -> error);
          }
        }

        // Alle Benutzer anzeigen (ohne userId)
        function showUsers($conn) {
          $sql3 = "SELECT name, vorname, email, passwort FROM users";
          $result = $conn -> query($sql3);
          $json_array = array();

          if (!$result) {
            die('Select fehlgeschlagen: ' . $conn -> connect_error);
          } else {
            while($row = $result -> fetch_assoc()) {
              $json_array[] = $row;
            }
            echo json_encode($json_array, JSON_UNESCAPED_UNICODE);
          }
        }


        // Ausführen der Funktionen
        insertUser($conn, $name, $vorname, $email, $passwort);
        showUsers($conn);



    // Verbindung beenden
    $conn -> close();
?>
