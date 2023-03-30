<!DOCTYPE html>
<?php
    // Session starten
    session_start();
?>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geheimer Garten</title>
</head>
<body>
    <?php
        if (isset($_SESSION['loggedin'])) {
            echo "Willkommen im Secret Garden!";
            echo '<ul><li><a href="./Logout.php">Logout</a></li></ul>';
        }
        else {
            echo "Unerlaubter Zugriff!<br>";
            echo '<ul><li><a href="./Login.php">Login</a></li><//ul>';
            echo '<ul><li><a href="./Register.php">Register</a></li></ul>';
        }
    ?>
</body>