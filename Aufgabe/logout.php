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
    <title>Logout</title>
</head>
<body>
    <?php
        // Session auflösen
        if (!(isset($_SESSION["loggedin"]))) {
            header("Location: ./login.php");
            exit();
        }
        else 
            setcookie($cookie_name, "", time() - 3600);  
            
            $sql = "DELETE FROM Sessions WHERE SessionID='".hash('sha256', $_COOKIE[$cookie_name])."'";
            $stmt = $conn->exec( $sql );
            $conn->commit();

            session_destroy();
            echo "Sie sind jetzt ausgeloggt!";
            header("refresh:3;url=./login.php");
            exit();
    ?>
</body>
