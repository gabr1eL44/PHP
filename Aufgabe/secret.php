<!DOCTYPE html>
<?php
    // Session starten
    session_start();
    $cookie_name = 'sessionid';
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
?>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geheimer Garten</title>
</head>
<body>
    <?php
        // Prüfe, ob Cookie mit aktiver Sitzung übereinstimmt
        if (!empty($_COOKIE[$cookie_name])) {
            $sql = "SELECT * FROM Sessions WHERE SessionID='".hash('sha256', $_COOKIE[$cookie_name])."'";
            $stmt = $conn->query( $sql );
            if (!empty($stmt->fetch())) {
                echo "Willkommen im Secret Garden!";
                echo '<ul><li><a href="./logout.php">Logout</a></li></ul>';
                $_SESSION["loggedin"] = true;
            }
            else {
                echo "Unerlaubter Zugriff! Sie werden auf die Login-Seite weitergeleitet...<br>";
                header("refresh:3;url=./login.php");
                exit();
            }
        }
        else {
            echo "Unerlaubter Zugriff! Sie werden auf die Login-Seite weitergeleitet...<br>";
            header("refresh:3;url=./login.php");
            exit();
        }
    ?>
</body>