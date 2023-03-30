<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung 10</title>
</head>
<body>
    <?php
        // Zugangsdaten
        $dbServer = "localhost";
        $dbPort = "3306";
        $dbDatabase = "PHP";
        $dbUser = "stefan";
        $dbPassword = "1234";

        // Erstelle Verbindung
        $conn = new PDO("mysql:host=$dbServer:$dbPort;dbname=$dbDatabase", "$dbUser", "$dbPassword");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
        $conn->beginTransaction();
        $sql = "SET NAMES 'utf8';";
        $stmt = $conn->query( $sql );

        // Erstelle Tabelle, falls nicht bereits vorhanden
        $sql = "CREATE TABLE IF NOT EXISTS Accounts (ID int NOT NULL AUTO_INCREMENT PRIMARY KEY, Vorname VARCHAR(20), Nachname VARCHAR(20), Geschlecht TEXT(8), Geburtsdatum DATE);";
        $stmt = $conn->query( $sql );

        // Prüfe, ob Standardnutzer bereits vorhanden
        $sql = "SELECT * FROM Accounts WHERE ID=1";
        $stmt = $conn->query( $sql );
        if (empty($stmt->fetch())) {
            $sql = "INSERT INTO Accounts VALUES ('1', 'Max', 'Mustermann', 'männlich', '1990-01-01');";
            $stmt = $conn->query( $sql );
        };

        // Füge nach neuer Benutzereingabe Benutzer hinzu
        if (!empty($_GET['vorname']) && !empty($_GET['nachname']) && !empty($_GET['nachname']) && !empty($_GET['geburtsdatum'])) {
            $sql = "SELECT * FROM Accounts WHERE Vorname='".$_GET['vorname']."' AND Nachname='".$_GET['nachname']."' AND Geschlecht='".$_GET['geschlecht']."' AND Geburtsdatum='".$_GET['geburtsdatum']."'";
            $stmt = $conn->query( $sql );
            if (empty($stmt->fetch())) {
                $sql = "INSERT INTO Accounts (Vorname, Nachname, Geschlecht, Geburtsdatum) VALUES ('".$_GET['vorname']."', '".$_GET['nachname']."', '".$_GET['geschlecht']."', '".$_GET['geburtsdatum']."');";
                $stmt = $conn->query( $sql );
            }
            else
                echo "Nutzer bereits vorhanden!";
        };

        // Zeige alle Benutzer aus Datenbank
        $sql = "SELECT * FROM Accounts";
        $stmt = $conn->query( $sql );
        echo "<p>";
        while ($row = $stmt->fetch()) {
            echo $row[0]."  ".$row[1]."  ".$row[2]."  ".$row[3]."  ".$row[4]."<br>";
        }
        echo "</p>";
    ?>
    <!--Eingabemaske für neuen Benutzer-->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="vorname">Vorname:</label><br>
        <input type="text" id="vorname" name="vorname"><br>
        <label for="nachname">Nachname:</label><br>
        <input type="text" id="nachname" name="nachname"><br>
        <label for="geschlecht">Geschlecht:</label><br>
        <input type="text" id="geschlecht" name="geschlecht"><br>
        <label for="geburtsdatum">Geburtsdatum:</label><br>
        <input type="text" id="geburtsdatum" name="geburtsdatum"><br><br>
        <input type="submit" value="Benutzer anlegen">
    </form>
</body>
</html>