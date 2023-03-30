<!DOCTYPE html>
<?php
    // Session starten
    session_start();
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
        if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
            header("Location: ./login.php");
            exit();
        }
        else {
            session_destroy();
            echo "Sie sind jetzt ausgeloggt!";
            header("refresh:3;url=./login.php");
            exit();
        }
    ?>
</body>
