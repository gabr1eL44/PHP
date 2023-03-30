<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        $sql = "CREATE TABLE IF NOT EXISTS Login (ID int NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(20), password VARCHAR(64));";
        $stmt = $conn->query( $sql );

        // Prüfe, ob Standardnutzer bereits vorhanden
        $sql = "SELECT * FROM Login WHERE ID=1";
        $stmt = $conn->query( $sql );
        if (empty($stmt->fetch())) {
            $sql = "INSERT INTO Login VALUES ('1', 'admin', '".hash('sha256', '1234')."');";
            $stmt = $conn->query( $sql );
        };

        // Füge nach neuer Benutzereingabe Benutzer hinzu
        if (!empty($_GET['username']) && !empty($_GET['password'])) {
            $sql = "SELECT * FROM Login WHERE Username='".$_GET['username']."' AND Password='".hash('sha256', $_GET['password'])."'";
            $stmt = $conn->query( $sql );
            if (empty($stmt->fetch())) {
                $sql = "INSERT INTO Login (Username, Password) VALUES ('".$_GET['username']."', '".hash('sha256', $_GET['password'])."');";
                $stmt = $conn->query( $sql );
            }
            else
                echo "Nutzer bereits vorhanden!";
        };

        // Zeige alle Benutzer aus Datenbank
        $sql = "SELECT * FROM Login";
        $stmt = $conn->query( $sql );
        echo "<p>";
        while ($row = $stmt->fetch()) {
            echo $row[0]."  ".$row[1]."  ".$row[2]."<br>";
        }
        echo "</p>";
    ?>
    <!--Eingabemaske für neuen Benutzer-->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Passwort:</label><br>
        <input type="password" id="password" name="password" size="20" maxlength="20"><br><br>
        <input type="submit" value="Benutzer anlegen">
    </form>
</body>
</html>