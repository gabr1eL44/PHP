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
        session_destroy();
        echo "Sie sind jetzt ausgeloggt!";
        echo '<ul><li><a href="./Login.php">Login</a></li></ul>';
    ?>
</body>
